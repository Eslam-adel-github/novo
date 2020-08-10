<script src="{{ asset('backend/shared/js/ib4stream.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    window.options = {
        url: "{{ config('ib4stream.wss_url') }}",
        appId: "{{ config('ib4stream.app_id') }}"
    }

    ion.sound({
        sounds: [
            {name: "deduction"},
        ],

        // main config
        path: "/sounds/",
        preload: true,
        multiplay: true,
        volume: 1
    });

    var vm = new Vue({
        el: '#kt_header',
        data: {
            unread: [],
            read: [],
            all_notifications: [],
            count_unread: 0,
        },
        mounted () {
            this.initWebsocketSubscribe();

            setTimeout(() => {
                this.getNotifications()
            }, 1000);
        },
        methods: {
            createDesktopNotification (title = 'Ibrain CRM', content = 'Ibrain CRM', image = '{{ asset('images/ibrain-logo.png') }}') {
                // Let's check if the browser supports notifications
                if (!("Notification" in window)) {
                    alert("This browser does not support system notifications");
                }

                // Let's check whether notification permissions have already been granted
                if (Notification.permission === "granted") {
                    // If it's okay let's create a notification
                    var notification = new Notification(title, { body: content, icon: image });
                }

                // Otherwise, we need to ask the user for permission
                if (Notification.permission !== 'denied') {
                    Notification.requestPermission(function (permission) {
                        // If the user accepts, let's create a notification
                        if (permission === "granted") {
                            var notification = new Notification(title, { body: content, icon: image });
                        }
                    });
                }
            },
            getNotifications () {
                axios.get('').then((res) => {
                    this.unread = res.data.payload.unread;
                    this.read = res.data.payload.read;
                    this.all_notifications = res.data.payload.all_notifications;
                    this.count_unread = res.data.payload.count_unread;
                });
            },
            initWebsocketSubscribe () {
                Ib4stream(options, (os) => {
                    os.subscribe("leads-assigned-to-{{ auth()->user()->id }}", (data) => {
                        ion.sound.play("deduction");

                        let $data = JSON.parse(data);

                        toastr.success("You Have " + $data.count + " Leads Assigned From " + $data.assigner, "Assigned Leads Notification");

                        this.createDesktopNotification(
                            "New Lead Assigned",
                            "You Have " + $data.count + " Leads Assigned From " + $data.assigner,
                        );

                        this.getNotifications()
                    });

                    os.subscribe("inventories-assigned-to-{{ auth()->user()->id }}", (data) => {
                        ion.sound.play("deduction");

                        let $data = JSON.parse(data);

                        toastr.success("You Have " + $data.count + " Inventories Assigned From " + $data.assigner, "Assigned Inventories Notification");

                        this.createDesktopNotification(
                            "New Inventory Assigned",
                            "You Have " + $data.count + " Inventory Assigned From " + $data.assigner,
                        );

                        this.getNotifications()
                    });

                    os.subscribe("new-notification-{{ auth()->user()->id }}", (data) => {
                        ion.sound.play("deduction");

                        let $data = JSON.parse(data);

                        toastr.success($data.message);

                        this.createDesktopNotification($data.message);

                        this.getNotifications()
                    });
                });
            },
            markAsRead(n) {
                axios.post('', n).then((res) => {
                    this.unread = res.data.payload.unread;
                    this.read = res.data.payload.read;
                    this.all_notifications = res.data.payload.all_notifications;
                    this.count_unread = res.data.payload.count_unread;
                });
            },
        },
    });
</script>

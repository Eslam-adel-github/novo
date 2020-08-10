<!--begin: Notifications -->
<div class="kt-header__topbar-item dropdown">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
		<span class="kt-header__topbar-icon" @click="getNotifications()"><i class="flaticon2-bell-alarm-symbol"></i></span>
		<span v-if="count_unread" class="kt-badge kt-badge--danger"></span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
		<form>

			<!--begin: Head -->
			<div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
				<h3 class="kt-head__title">
					{{ __('main.notifications') }}
					&nbsp;
					<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">
						@{{ count_unread }} {{ __('main.new') }}
					</span>
				</h3>
				<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
					<li class="nav-item">
						<a class="nav-link active show" data-toggle="tab" href="#unread_notifications" role="tab" aria-selected="true">{{ __('main.unread') }}</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#read_notifications" role="tab" aria-selected="false">{{ __('main.read') }}</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#all_notifications" role="tab" aria-selected="false">{{ __('main.all_notifications') }}</a>
					</li>
				</ul>
			</div>

			<!--end: Head -->
			<div class="tab-content">
				<div class="tab-pane active show" id="unread_notifications" role="tabpanel">
					<div v-show="count_unread" class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
						<a v-for="(n, index) in unread" @click="markAsRead(n)" :href="n.data.entity.url" target="_blank" class="kt-notification__item" :class="{'kt-notification__item--read': (n.read_at != null)}">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-user kt-font-primary"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									@{{ n.data.title }}
								</div>
								<div class="kt-notification__item-time">
									@{{ n.data.entity.created_at }}
								</div>
							</div>
						</a>
					</div>
					<div v-show="!count_unread" class="kt-grid kt-grid--ver" style="min-height: 200px;">
						<div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
							<div class="kt-grid__item kt-grid__item--middle kt-align-center">
								{{ __('main.all_caught_up') }}
								<br>
								{{ __('main.no_new_notifications') }}
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="read_notifications" role="tabpanel">
					<div v-show="read.length" class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
						<a v-for="(n, index) in read" :href="n.data.entity.url" class="kt-notification__item" :class="{'kt-notification__item--read': (n.read_at != null)}">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-user kt-font-primary"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									@{{ n.data.title }}
								</div>
								<div class="kt-notification__item-time">
									@{{ n.data.entity.created_at }}
								</div>
							</div>
						</a>
					</div>
					<div v-show="!read.length" class="kt-grid kt-grid--ver" style="min-height: 200px;">
						<div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
							<div class="kt-grid__item kt-grid__item--middle kt-align-center">
								{{ __('main.all_caught_up') }}
								<br>
								{{ __('main.no_new_notifications') }}
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="all_notifications" role="tabpanel">
					<div v-show="all_notifications.length" class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
						<a v-for="(n, index) in all_notifications" :href="n.data.entity.url" class="kt-notification__item" :class="{'kt-notification__item--read': (n.read_at != null)}">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-user kt-font-primary"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									@{{ n.data.title }}
								</div>
								<div class="kt-notification__item-time">
									@{{ n.data.entity.created_at }}
								</div>
							</div>
						</a>
					</div>
					<div v-show="!all_notifications.length" class="kt-grid kt-grid--ver" style="min-height: 200px;">
						<div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
							<div class="kt-grid__item kt-grid__item--middle kt-align-center">
								{{ __('main.all_caught_up') }}
								<br>
								{{ __('main.no_new_notifications') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!--end: Notifications -->

<template>
	<div>
		<div class="row" style="margin-bottom: 20px;">
			<gmap-autocomplete class="form-control col-10" @place_changed="setPlace"></gmap-autocomplete>

			<button @click="addMarker" type="button" class="btn btn-brand col-2">
				<i class="la la-check"></i>
				<span class="kt-hidden-mobile">Search</span>
			</button>
		</div>

		<div class="row">
			<gmap-map :center="center" :zoom="zoom" class="form-control" style="width:100%; height: 400px;">
    			<!-- <gmap-marker :key="index" v-for="(mark, index) in markers" :position="mark.position" @click="center=center.position"></gmap-marker> -->
    			<gmap-marker :position="center" :draggable="true" @zoom_changed="test()" @drag="updateCoordinates"></gmap-marker>
    		</gmap-map>
		</div>
	</div>
</template>

<script>
	export default {
		name: "GoogleMap",
		data() {
			return {
				center: { lat: 45.508, lng: -73.587 },
				zoom: 14,
				markers: [],
				places: [],
				currentPlace: null
			};
		},
		mounted() {
			this.geolocate();

			setTimeout(() => {
				this.oldPlace();
			}, 1000)
		},
		methods: {
			setPlace(place) {
				this.currentPlace = place;
			},
			addMarker() {
				if (this.currentPlace) {
					const marker = {
						lat: this.currentPlace.geometry.location.lat(),
						lng: this.currentPlace.geometry.location.lng(),
						zm: this.zoom,
					};
					this.center = marker;
					this.markers.push({ position: marker });
					this.places.push(this.currentPlace);
					vue._data.fData.latitude  = marker.lat;
					vue._data.fData.longitude = marker.lng;
					vue._data.fData.zoom      = this.zoom;
					vue._data.fData.place     = this.currentPlace;
					// console.log('marker lat ' + marker.lat);
					// console.log('marker lng ' + marker.lng);
					this.currentPlace = null;
				}
			},
			updateCoordinates(location) {
				const marker = {
					lat: location.latLng.lat(),
					lng: location.latLng.lng(),
				};
				this.center = marker;
				this.markers.push({ position: marker });
				this.places.push(this.currentPlace);
				vue._data.fData.latitude  = marker.lat;
				vue._data.fData.longitude = marker.lng;
				vue._data.fData.zoom      = this.zoom;
				vue._data.fData.place     = this.currentPlace;
				// console.log('marker Drag lat ' + marker.lat);
				// console.log('marker Drag lng ' + marker.lng);

				this.currentPlace = {
					lat: location.latLng.lat(),
					lng: location.latLng.lng(),
				};
				this.currentPlace = null;
			},
			geolocate() {
				navigator.geolocation.getCurrentPosition(position => {
					this.center = {
						lat: position.coords.latitude,
						lng: position.coords.longitude,
					};
					// console.log('Current lat ' + this.center.lat);
					// console.log('Current lng ' + this.center.lng);
				});
			},
			oldPlace() {
				//Check if Main VUE object have data to lat & lng
				if(vue._data.fData.latitude && vue._data.fData.longitude){
					this.currentPlace = vue._data.fData.place;
					const oldMarker = {
						lat: Number(vue._data.fData.latitude),
						lng: Number(vue._data.fData.longitude),
						zm:  Number(vue._data.fData.zoom),
					};
					this.center = oldMarker;
					// this.markers.push({ position: oldMarker });
					// this.places.push(this.currentPlace);
					// console.log('oldMarker lat ' + oldMarker.lat);
					// console.log('oldMarker lng ' + oldMarker.lng);
					this.currentPlace = null;
				}
			}
		}
	};
</script>

<template>
  <v-row align="center">
    <v-row justify="space-around">
      <v-switch v-model="disabled" class="mx-2" label="Disabled"></v-switch>
      <v-switch v-model="readonly" class="mx-2" label="Readonly"></v-switch>
      <v-switch v-model="landscape" class="mx-2" label="Landscape"></v-switch>
      <v-switch v-model="ampmInTitle" class="mx-2" label="AM/PM in title"></v-switch>
      <v-switch v-model="useSeconds" class="mx-2" label="Use seconds"></v-switch>
      <v-switch v-model="fullWidth" class="mx-2" label="Full-width"></v-switch>
      <v-switch v-model="noTitle" class="mx-2" label="No title"></v-switch>
      <v-switch v-model="scrollable" class="mx-2" label="Scrollable"></v-switch>
      <v-btn-toggle v-model="format">
        <v-btn text value="ampm">
          12h
        </v-btn>
        <v-btn text value="24hr">
          24h
        </v-btn>
      </v-btn-toggle>
    </v-row>
    <v-time-picker
      v-model="time"
      class="mt-2"
      :disabled="disabled"
      :readonly="readonly"
      :landscape="landscape"
      :ampm-in-title="ampmInTitle"
      :use-seconds="useSeconds"
      :format="format"
      :full-width="fullWidth"
      :no-title="noTitle"
      :scrollable="scrollable"
    ></v-time-picker>
  </v-row>
</template>
<script>
  export default {
    name: "TimePicker",
    data () {
      return {
        time: null,
        disabled: false,
        readonly: false,
        landscape: false,
        ampmInTitle: false,
        useSeconds: false,
        format: 'ampm',
        fullWidth: false,
        noTitle: false,
        scrollable: false,
      }
    },
  }
</script>
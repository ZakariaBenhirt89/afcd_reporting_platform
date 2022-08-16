<template>
    <GoogleMap  api-key="AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg" style="width: 100%; height: 100%" :center="center" :zoom="15">
    </GoogleMap>
</template>
<script>
import { GoogleMap , Marker , MarkerCluster } from "vue3-google-map";
import {ref} from "vue";
export default {
    name: 'Map',
    components:{
      GoogleMap,
      MarkerCluster,
      Marker,
    },
    setup(){
        const center = { lat:31.56717001089404, lng:-7.653935889683484 };
        const arr = ref([])
        return{
            center,
        }
    }
}
</script>

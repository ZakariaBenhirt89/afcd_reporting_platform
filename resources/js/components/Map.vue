<template>
    <GoogleMap  api-key="AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg" style="width: 100%; height: 100%" :center="center" :zoom="15">
        <MarkerCluster>
            <CustomMarker v-for="data in arr" :options="{ position: getObject(data), anchorPoint: 'BOTTOM_CENTER' }" :key="data['id']">
                <div style="text-align: center">
                    <div style="font-size: 1.125rem">{{ data['title']}}</div>
                    <img :src="data['icon']" width="50" height="50" style="margin-top: 2px"  alt="nice icon"/>
                </div>
            </CustomMarker>
        </MarkerCluster>
    </GoogleMap>
</template>
<script>
import { GoogleMap , Marker , MarkerCluster , CustomMarker} from "vue3-google-map";
import {ref} from "vue";
import axios from "axios";
export default {
    name: 'Map',
    components:{
      GoogleMap,
      MarkerCluster,
      Marker,
        CustomMarker,
    },
    setup(){
        const center = { lat:31.56717001089404, lng:-7.653935889683484 };
        const arr = ref([])
        return{
            center,
            arr,
        }
    },
    methods:{
        fetchData: function () {
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/get/issuesAproved').then((res) => {
                    console.log(res)
                    this.arr = res.data
                })
            }
        },
        getObject(obj){
            return {lat: Number(obj['lat']) , lng: Number(obj['lng'])}
        }
    },
    created() {
        this.fetchData()

    }
}
</script>

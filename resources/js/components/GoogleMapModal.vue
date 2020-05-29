<template>
    <!--Modal Google mapp-->
    <div class="modal" id="add_popupaddress" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="google-modal-header" >
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4>Google Map</h4>
                </div>
                <div class="container"></div>
                <div class="modal-body">
                    <article id="adress_popup_map"
                             style="width:100%; height:100%; margin-top: 10px; float: left; position: relative;overflow: visible;z-index: 10;display:none;">
                        <p style="display:none;">Finding your location: <span id="status">checking...</span></p>
                    </article>
                    <GmapMap
                        :center="position"
                        :zoom="15"
                        map-type-id="terrain"
                        style="width: 100%; height: 69vh"
                    >
                        <GmapMarker
                            :key="1"
                            :position="position"
                            :clickable="true"
                            :draggable="true"
                            @drag="updateCoordinates"
                        />
                    </GmapMap>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)"
                       data-dismiss="modal"
                       class="btn btn-primary googleSaveButton"
                       @click="saveChanges()"
                    >Save changes</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Cookies from 'js-cookie';
    export default {
        name: "GoogleMapModal",
        data () {
            return {
                lat:'',
                long:'',
                position:{
                    lat: 31.952854083674143,
                    lng: 35.90975761276855
                },
                coordinates: null,
                address: ''

            };
        },
        methods: {
            saveChanges(){
                axios.post('/reverse-geo-coding', this.coordinates).then(response => {
                    this.address = response.data;
                    bus.$emit('closeGoogleMap', true);
                    bus.$emit('locationCoordinates', {coordinates: this.coordinates, address:this.address})
                }).catch(e => {

                })

            },

            updateCoordinates(location) {
                this.coordinates = {
                    lat: location.latLng.lat(),
                    lng: location.latLng.lng(),
                };
            },


        },
        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            bus.$on('setLocation' , (data)=>{
                if (data){
                    this.position = data;
                }
                this.$bvModal.show("add_popupaddress")
            })

        },
    }
</script>

<style scoped>
    /*Google modal */
    #add_popupaddress >.modal-dialog {
        width: 70%;
        margin: 0 auto;
        top: 2rem;
        height: 500px;
        max-width: 70%;
    }
    .googleSaveButton{
        background-color: #407f99!important;
        border-color: #407f99!important;
    }
    .google-modal-header{
        padding: 15px;
        border-bottom: 1px solid #dee2e6;
    }
</style>

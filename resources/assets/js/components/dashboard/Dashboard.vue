<template>
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-2 side-nav-dash">
                <ul class="list-group">
                    <li class="list-group-item"><button @click="showPodcasts()" class="btn btn-light">Podcasts</button></li>
                    <li class="list-group-item"><button @click="showLatestEpisodes()" class="btn btn-light">New Releases</button></li>
                    <li class="list-group-item"><button @click="searchPodcasts()" class="btn btn-light">Search</button></li>
                    <li class="list-group-item"><button @click="showCurrentPlaylist()" class="btn btn-light">Current Playlist</button></li>
                    <li class="list-group-item"><button @click="showSettings()" class="btn btn-light">PodPlayer Settings</button></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">{{ name }}'s profile details:</div>

                    <div class="card-body">
                        This is where the dashboard details go.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name: 'Vishnu'
            }
        }
    }
</script>

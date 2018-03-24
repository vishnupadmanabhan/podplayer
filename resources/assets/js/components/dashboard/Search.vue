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
                        <form action="">
                            <div class="input-group mb-3">                            
                                <input type="text" class="form-control" placeholder="Search podcast" aria-label="Podcast search" aria-describedby="basic-addon2" v-model="searchTerm" name="q">
                                <div class="input-group-append">
                                    <button @click.prevent="searchApple()" class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>                         
                            </div>
                        </form>
                    </div>
                </div>
                <div v-for="result in podcastResults" :key="result.trackId">
                    {{ result.trackName }}
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
                name: 'Vishnu',
                podcastResults: [],
                searchTerm: ''
            }
        },
        methods: {
            searchApple() {
                let formattedSearchTerm = (this.searchTerm).replace(/\s/g, '+');
                let apple_api_url = `https://itunes.apple.com/search?term=${formattedSearchTerm}&media=podcast`;
                fetch(apple_api_url)
                    .then(res => res.json())
                    .then(res => { this.podcastResults = res.data })
                    .then(console.log(this.podcastResults))
                    .catch(err => console.log(err));
            }
        }
    }
</script>

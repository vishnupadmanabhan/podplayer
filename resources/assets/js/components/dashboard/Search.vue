<template>
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-2 side-nav-dash">
                <ul class="list-group">
                    <li class="list-group-item"><button @click="searchPodcasts()" class="btn btn-light">Search</button></li>
                    <li class="list-group-item"><button @click="showPodcasts()" class="btn btn-light">Podcasts</button></li>
                    <li class="list-group-item"><button @click="showLatestEpisodes()" class="btn btn-light">New Releases</button></li>
                    <li class="list-group-item"><button @click="showCurrentPlaylist()" class="btn btn-light">Current Playlist</button></li>
                    <li class="list-group-item"><button @click="showSettings()" class="btn btn-light">PodPlayer Settings</button></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">Search Podcasts:</div>
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

                <div class="row">
                    <div v-if="!podcastResults.length">
                        <p>No results to display...</p>
                    </div>
                    <div v-for="result in podcastResults" :key="result.collectionId" class="col-sm-3 my-4">
                        <div class="card-deck">
                            <div class="card">
                                <img class="card-img-top" :src="result.artworkUrl600" :alt="result.trackName"> 
                                <div class="card-body">
                                    <h5 class="card-title text-center"><span class="badge badge-pill badge-danger" v-if="result.collectionExplicitness === 'explicit'" title="Explicit">E</span> <a :href="result.feedUrl"><strong>{{ result.trackName }}</strong></a></h5>
                                    
                                    <!-- <p class="card-text">{{ result.artistName }}</p>
                                    <p class="card-text"><span class="badge badge-danger" v-if="result.collectionExplicitness === 'explicit'" title="Explicit">E</span> <small>{{ result.primaryGenreName }}</small></p>
                                    
                                    <a :href="result.feedUrl" class="btn btn-primary btn-block">View Podcast</a>  -->
                                    <p class="card-text"><small class="text-muted">Last updated {{ moment(result.releaseDate).format('DD/MM/YYYY') }}</small></p>
                                </div>
                            </div>
                        </div>
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
                name: 'Vishnu',
                podcastResults: [],
                episodes: [],
                searchTerm: ''
            }
        },
        methods: {

            // including moment.js
            moment(timestamp) {
                return moment(timestamp);
            },

            // use the apple podcast api to pull the podcast details
            searchApple() {
                this.podcastResults = [];
                let formattedSearchTerm = (this.searchTerm).replace(/\s/g, '+');
                let apple_api_url = `https://itunes.apple.com/search?term=${formattedSearchTerm}&media=podcast`;
                fetch(apple_api_url)
                    .then(blob => blob.json())
                    .then(data => data.results)
                    .then(data => this.podcastResults.push(...data))
                    .catch(error => console.log(error));

                // get the xml feed and pull the episodes
                // pull the feedUrl
                let parseXml = new XMLHttpRequest();
                console.log("XML Parsing started...");
                this.podcastResults.forEach(element => {
                    console.log(this.podcastResults);
                    parseXml.open("GET", this.podcastResults.feedUrl, false);
                    parseXml.setRequestHeader("Content-Type", "text/xml");
                    parseXml.send(null);
                    

                });

            },

            findMatches(queryString, podcasts) {
                return this.podcastResults.filter(podcast => {
                    // match the podcast with the query string
                    const regex = new RegExp(queryString, 'gi');
                    return podcast.artistName.match(regex) || podcast.collectionName.match(regex)
                });
            },

            displayMatches() {
                const searchInput = this.searchTerm;
            }
        }
    }
</script>

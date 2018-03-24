<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="align-middle">Edit your profile details:</span>
                        <button href="#" class="btn btn-light float-right">Edit Profile</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://res.cloudinary.com/vishnupadmanabhan/image/upload/v1491302323/favicon.jpg" alt="profile picture" class="img-thumbnail profile-picture">
                                <p class="profile-location"><svg class="svg-icon" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg> Bangalore, IN</p>
                            </div>
                            <div class="col-md-9">
                                <p class="profile-name">{{ name }}</p>
                                <p class="profile-title">Listener and Producer</p>
                                <p class="profile-description">
I enjoy living. I try to see positivity in everything. Sarcastic most of the time and coding the rest. Love music and cannot live without it. I love traveling and food.</p>
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
                name: 'Vishnu Padmanabhan'
            }
        }
    }
</script>

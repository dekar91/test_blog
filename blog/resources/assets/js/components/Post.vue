<template>
    <div class="container">
        <div class="row">
            <div class="post-body col-sm-12 col-md-12 col-lg-9">
                    <article>
                        <div class=" post-content">
                                <h1 class="post-title">{{ post.title }}</h1>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="post-published">
                                            {!! post.content !!}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div>
                                    <div>
                                        <i class="fa fa-clock-o"></i>
                                        Published: {{ post.ts }} by {{ post.user.name }}
                                    </div>
                                </div>
                            </div>
                    </article>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                endpoint: 'post/view'
            };
        },

        created() {
            fetch(this.endpoint)
                .then(response => response.json())
                .then(json => {this.posts = json.posts})
        }
    }

</script>

<style scoped>

</style>
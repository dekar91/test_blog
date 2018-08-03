<template>
    <div class="container">
        <div class="row">
                <div class="post col-sm-6" v-for="post in posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a v-bind:href="post.url" class="post-link"> {{ post.title }}</a>
                                    </h2>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="text-muted">Published:</span>
                                            <small class="text-muted">{{ post.ts }}</small>
                                        </div>
                                        <div class="post-annotation col-sm-12">{{ post.content |truncate(140) }}</div>
                                        <div class="post-buttons col-sm-12" v-if="post.hasAccess">
                                            <a v-bind:href="post.deleteUrl" class="post-delete" title="Remove post"><i
                                                    class="fa fa-trash-o"></i></a>
                                            <a v-bind:href="post.editUrl" class="post-edit" title="Edit post"><i
                                                    class="fa fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr/>
                    </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                posts: [],
                endpoint: 'post'
            };
        },
        created () {
            fetch(this.endpoint)
                .then(response => response.json())
                .then(json => {
                    this.posts = json.data;
                });
        },
        filters: {
            truncate: function(value, length) {
                if(value.length < length) {
                    return value;
                }

                length = length - 3;

                return value.substring(0, length) + '...';
            }
        }
    };

</script>

<style scoped>

</style>
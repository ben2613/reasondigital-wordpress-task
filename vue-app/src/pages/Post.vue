<template>
  <div class="article-single">
    <article>
      <header class="entry-header alignwide">
        <h1 class="entry-title" v-html="post.title.rendered"></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <div v-html="post.content.rendered"></div>
        <img :trigger="$store.state.media[post.featured_media]" :src="getMedia(post.featured_media)" />
      </div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->
  </div> <!-- article-single -->
</template>
<script>
export default {
  methods: {
    getMedia(mediaId) {
      let search = null;
      if (this.$store.state.media[mediaId] !== undefined) {
        search = this.$store.state.media[mediaId]
        return search.media_details.sizes.full.source_url
      } else {
        this.axios.get('/wp/v2/media/' + mediaId).then(({data}) => {
          this.$store.state.media[mediaId] = data;
        })
        return '';
      }
    }
  },
  computed: {
    post() {
      return this.$store.state.posts.find((p) => p.id === Number(this.$route.params.id))
    }
  }
}
</script>
<style lang="scss">
$margin: 120px;
$pWidth: 35%;
.article-single {
  .entry-content {
    margin-top: -$margin;
    display: flex;
    div {
      width: $pWidth;
      padding-top: $margin;
    }
    img {
      width: 100% - $pWidth;
      height: 100%;
      object-fit: cover;
    }
  }
}
</style>

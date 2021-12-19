<template>
  <header>
    <div id="icon-n-menu">
      <label for="menu-toggle" id="menu-icon">
        <div></div>
        <div></div>
        <div></div>
      </label>
      <a href="http://localhost:8080/" class="custom-logo-link" rel="home" aria-current="page">
        <img :src="siteLogoUrl" class="custom-logo" :alt="siteTitle" />
      </a>
    </div>
    <input type="checkbox" id="menu-toggle" />
    <div class="menu-expand">
      <div class="site-info">
        <h1 class="site-title">{{ siteTitle }}</h1>
        <h2 class="site-tagline">{{ siteTagline }}</h2>
      </div>
      <div class="cat-menu">
        <router-link to="/">All</router-link>
        <router-link v-for="cat in categories" :key="cat.id" :to="'/cat/' + cat.id">{{
          cat.name
        }}</router-link>
      </div>
    </div>
  </header>
</template>
<script>
export default {
  computed: {
    siteLogoUrl() {
      return this.$store.state.siteLogoUrl
    },
    siteTitle() {
      return this.$store.state.siteTitle
    },
    siteTagline() {
      return this.$store.state.indexJson.description
    },
    categories() {
      return this.$store.state.categories.filter((cat) => cat.name !== 'Uncategorized')
    },
  },
}
</script>
<style lang="scss">
header.page-header,
main {
  position: relative;
}

header.page-header {
  z-index: 1;
}
main {
  z-index: 0;
}

#icon-n-menu {
  display: flex;
  flex-direction: row-reverse;
  justify-content: space-between;
  img {
    width: 40px;
    height: 40px;
  }
  #menu-icon {
    cursor: pointer;
    padding-right: 20px;
    div {
      width: 35px;
      height: 5px;
      background-color: black;
      box-shadow: 0px 0px 10px white;
      margin: 6px 0;
    }
  }
}
#menu-toggle {
  display: none;
  & + .menu-expand {
    max-height: 0px;
    overflow: hidden;
    transition: max-height 500ms ease-out;
  }
  &:checked + .menu-expand {
    max-height: 400px;
    transition: max-height 500ms ease-in;
  }
}
.menu-expand {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  align-items: flex-end;
  .cat-menu a {
    &:first-of-type {
      margin-left: 0;
    }
    & + a {
      margin-left: 3em;
    }
    &[aria-current] {
      text-decoration: underline !important;
    }
  }
  .site-tagline {
    margin-bottom: 0;
  }
}
</style>

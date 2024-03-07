<script setup>
import Header from '@/Components//Header.vue';
import Footer from '@/Components/Footer.vue';
import Department from '@/Components/Department.vue';
</script>
<template>
  <div class="sub_page">
    <div class="hero_area">
    <div class="hero_bg_box">
      <img src="../../../public/frontend/assets/images/hero-bg.png" alt="">
    </div>
    <Header></Header>
  </div>
  <Department />
  <Footer></Footer>
  </div>
</template>
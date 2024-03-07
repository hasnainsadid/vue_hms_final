<script setup>
import Header from '@/Components//Header.vue';
import Footer from '@/Components/Footer.vue';
import Doctor from '@/Components/Doctor.vue';
</script>
<template>
  <div class="sub_page">
    <div class="hero_area">
    <div class="hero_bg_box">
      <img src="/frontend/assets/images/hero-bg.png" alt="Hero Background">
    </div>
    <Header></Header>
  </div>
  <Doctor />
  <Footer></Footer>
  </div>
</template>
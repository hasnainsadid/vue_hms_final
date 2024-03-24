<script setup>
import { usePage } from '@inertiajs/vue3';
const {departments} = usePage().props
</script>
<style scoped>
  .card {
  background-color: rgb(122, 165, 107);
}
</style>

<template>
  <!-- department section -->
  <section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our Departments
          </h2>
          <p>
            Asperiores sunt consectetur impedit nulla molestiae delectus repellat laborum dolores doloremque accusantium
          </p>
        </div>
        <div class="row">
          <div class="col-md-3 my-4 bgc" v-for="dept in departments">
            <div class="card" style="height: 280px; overflow-y: hidden;">
              <div class="detail-box">
                <h5 class="card-header text-center">
                  {{dept.name}}
                </h5>
                <p class="card-body text-justify">
                  {{dept.description}}
                </p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- end department section -->
</template>
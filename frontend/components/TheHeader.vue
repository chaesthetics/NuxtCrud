

<script>

</script>

<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container">
    <NuxtLink class="navbar-brand" to="/">Navbar</NuxtLink>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <NuxtLink class="nav-link active" to="/">Home</NuxtLink>
        </li>
        <li class="nav-item">
          <NuxtLink class="nav-link active" to="/about-page">About Us</NuxtLink>
        </li>
        <li class="nav-item">
          <NuxtLink class="nav-link active" to="/contact-page">Contact</NuxtLink>
        </li>
        <li class="nav-item">
          <NuxtLink class="nav-link active" to="/students">Students</NuxtLink>
        </li>
      </ul>
    </div>
  </div>
</nav>
</template>

<style>

</style>
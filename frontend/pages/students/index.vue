<script setup>

</script>
<template>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Student Lists
                <NuxtLink to="/students/create" class="btn btn-primary float-end">Add Student</NuxtLink>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<style></style>
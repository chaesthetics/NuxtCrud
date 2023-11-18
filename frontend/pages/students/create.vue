<script setup>
import { reactive } from 'vue';

const student = reactive({
    name: '',
    course: '',
    email: '',
    phone: '',
});

const isLoading = ref(false);
const isLoadingTitle = ref('Loading');

const saveStudent = () =>{
    isLoading.value = true;
    isLoadingTitle.value = 'Saving';
}

</script>
<template>
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Student
                    <NuxtLink class="btn btn-danger float-end" to="/">Back</NuxtLink>
                </h4>
            </div>
                <div class="card-body">
                <div v-if="isLoading">
                    <Loading :title="isLoadingTitle"/>
                </div>
                <form @submit.prevent="saveStudent" v-else>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input v-model="student.name" id="name" type="text" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="course">Course</label>
                        <input v-model="student.course" id="course" type="text" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input v-model="student.email" id="email" type="text" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input v-model="student.phone" id="phone" type="text" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Create Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<style>
</style>
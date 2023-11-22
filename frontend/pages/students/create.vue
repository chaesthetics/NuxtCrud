<script setup>
import { reactive } from 'vue';
import useStudent from '../../composables/student';

const { storeStudents, errors } = useStudent();

const initialState = {
    name: '',
    course: '',
    email: '',
    phone: '',
};

const validationError = {
    name: false,
    course: false,
    email: false,
    phone: false,
}

const student = reactive({...initialState});

const isLoading = ref(false);
const isLoadingTitle = ref('Loading');

const saveStudent = async() => {
    console.log(errors.value?.data?.name[0]);
    isLoading.value = true;
    isLoadingTitle.value = 'Saving';
    console.log(isLoadingTitle.value);
    await storeStudents(student);
    isLoading.value = false;
    isLoadingTitle.value = 'Loading';

    validationError.value = errors.value.data;
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
                        <label for="name"></label>
                        <input v-model="student.name" id="name" type="text" class="form-control"/>
                        <div v-if="validationError.value?.name">
                            <Validator :message="validationError.value.name[0]"/>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <label for="course">Course</label>
                        <input v-model="student.course" id="course" type="text" class="form-control"/>
                        <div v-if="validationError.value?.course">
                            <Validator :message="validationError.value.course[0]"/>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input v-model="student.email" id="email" type="text" class="form-control"/>
                        <div v-if="validationError.value?.email">
                            <Validator :message="validationError.value.email[0]"/>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input v-model="student.phone" id="phone" type="text" class="form-control"/>
                        <div v-if="validationError.value?.phone">
                            <Validator :message="validationError.value.phone[0]"/>
                        </div> 
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
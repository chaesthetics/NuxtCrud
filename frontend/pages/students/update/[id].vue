<script setup>
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import { useRouter } from "vue-router";
import useStudent from "../../../composables/student";

const route = useRoute();
const router = useRouter();

const { getStudent, student, updateStudent } = useStudent();

onMounted(() => {
    getStudent(route.params.id);
});

const updateHandler = async() => {
    await updateStudent(student.value, route.params.id)
    .then(()=>{
        router.push({ path: "/students" });
    });
}

</script>
<template>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Update user
                <NuxtLink to="/students" class="btn btn-danger float-end">Back</NuxtLink>
            </div>
            <div class="card-body">
                <form @submit.prevent="updateHandler">
                    <div class="mb-3">
                        <label for="fullname">Fullname</label>
                        <input v-model="student.name" class="form-control" type="text" id="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="course">Course</label>
                        <input v-model="student.course" class="form-control" type="text" id="course"/>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input v-model="student.email" class="form-control" type="email" id="email"/>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input v-model="student.phone" class="form-control" type="text" id="phone"/>
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
<style>
</style>
<script setup>
import { onMounted } from "vue";
import useStudent from "/composables/student";

const { getStudents, students, deleteStudent } = useStudent();

onMounted( () => {
    getStudents();
});

const deleteHandler = async(id) => {
    await deleteStudent(id);
    await getStudents();
}

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
                    <tr v-for="(student, index) in students" :key="index">
                        <td>{{ student.id }}</td>
                        <td>{{ student.name }}</td>
                        <td>{{ student.course }}</td>
                        <td>{{ student.email }}</td>
                        <td>{{ student.phone }}</td>
                        <td>{{ student.created_at }}</td>
                        <td>
                            <NuxtLink class="btn btn-primary" :to="`/students/update/${student.id}`">Update</NuxtLink>
                            <button class="btn btn-danger" @click="deleteHandler(student.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<style></style>
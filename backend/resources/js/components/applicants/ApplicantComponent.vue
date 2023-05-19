<template>
  <tr>
    <td>{{ index }}</td>
    <td>{{ applicant.user.name }}</td>
    <td>{{ applicant.user.email }}</td>
    <td>{{ applicant.user.personal_info.phone }}</td>
    <td>
      <div :class="appliedStatus">{{ applicant.status }}</div>
    </td>
    <td>
      <router-link to class="btn btn-sm btn-primary">
        <i class="fas fa-info"></i>
      </router-link>
    </td>
  </tr>
</template>

<script>
export default {
  name: "ApplicantComponent",
  props: ["applicant", "index"],
  data() {
    return {
      appliedStatus: this.checkStatus(this.applicant.status)
    };
  },
  methods: {
    checkStatus(status) {
      switch (status) {
        case "Pending":
          return "badge badge-primary";
        case "Cancel":
          return "badge badge-danger";
        case "Confirm":
          return "badge badge-success";
        default:
          return "";
      }
    }
  }
};
</script>

<style>
</style>

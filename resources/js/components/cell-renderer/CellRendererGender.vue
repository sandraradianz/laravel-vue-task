<template>
    <vs-chip class="ag-grid-cell-chip">
     {{ displayGender(params.data.gender)}}
    </vs-chip>
</template>

<script>
export default {
  name: 'CellRendererStatus',
  computed: {
    displayGender () {
      return (gender) => {
        if(gender == 1){
          return 'Male'
        }else if(gender == 2){
          return 'Female'
        }else if(gender == 3){
          return 'Others'
        }else if(gender == 4){
          return 'Transgender'
        }else{
          return 'Not Mentioned'
        }
      }
    }
  }
}
</script>

<style lang="scss" scpoped>
.ag-grid-cell-chip {
  &.vs-chip-success {
    background: rgba(var(--vs-success),.15);
    color: rgba(var(--vs-success),1) !important;
    font-weight: 500;
  }
  &.vs-chip-warning {
    background: rgba(var(--vs-warning),.15);
    color: rgba(var(--vs-warning),1) !important;
    font-weight: 500;
  }
  &.vs-chip-danger {
    background: rgba(var(--vs-danger),.15);
    color: rgba(var(--vs-danger),1) !important;
    font-weight: 500;
  }
}
</style>

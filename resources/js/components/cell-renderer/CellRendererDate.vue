<template>
    <vs-chip class="ag-grid-cell-chip" :color="secondary">
     {{ displayDate(params.data.reg_date)}}
    </vs-chip>
</template>

<script>
export default {
  name: 'CellRendererStatus',
  computed: {
    displayDate () {
      return (year) => {

        var date = new Date(year);
        return date.getDate().toString().padStart(2, "0")+"-"+(date.getMonth()+1).toString().padStart(2, "0")+"-"+date.getFullYear()
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

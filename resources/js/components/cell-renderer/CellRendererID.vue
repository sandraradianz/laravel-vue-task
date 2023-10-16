<template>
    <div :style="{'direction': $vs.rtl ? 'rtl' : 'ltr'}">
      <span>UR-{{params.data.id}}</span>      
    </div>
</template>

<script>
export default {
  name: 'CellRendererID',
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
.address-section{
  line-height:10px;
}
.house-section{
  line-height:20px;
}
</style>


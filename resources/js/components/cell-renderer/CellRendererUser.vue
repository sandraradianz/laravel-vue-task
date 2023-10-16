<template>
    <div class="address-section">
       <div>{{params.data.user_name}}[{{params.data.user_code}}]
       <br><span class="house-section"> {{ displayDate(params.data.created_at.slice(0,10))}}</span>
       <br><span class="address-section">{{timeConvert(displayTime(params.data.created_at))}}</span>
       </div>
     </div>
</template>
<script>
import moment from 'moment';
export default {
  name: 'CellRendererUser',
   computed: {
    displayDate () {
      return (year) => {
        var date = new Date(year);
        return date.getDate().toString().padStart(2, "0")+"-"+(date.getMonth()+1).toString().padStart(2, "0")+"-"+date.getFullYear()
    }
    },
  displayTime () {
      return (year) => {
        var date = new Date(year);
        var hours = date.getHours();
        return hours + ":" + date.getMinutes() 
  }
  }
  },
   methods: {
   moment: function () {
       return moment();
     },
   timeConvert (time) {
   var timeSet=moment(time, 'hh:mm').format('hh:mm A')
   return timeSet
    }, 
    }
    }
</script>
<style lang="scss" scpoped>
.address-section{
  line-height:5px;
}
.house-section{
  line-height:20px;
}
</style>


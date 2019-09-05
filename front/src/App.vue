<template>
  <div id="app">
      <div class="col">
          <div class="row">
              <table>
                  <tr>
                      <th v-show="filters.model">Model</th>
                      <th v-show="filters.year">Year</th>
                      <th v-show="filters.color">Color</th>
                      <th v-show="filters.audiosystem">Audiosystem</th>
                  </tr>
                  <tr v-for="(car, index) in carsList" :key="index">
                      <td v-show="filters.model"> {{ car.model ? car.model : 'UNKNOWN' }} </td>
                      <td v-show="filters.year"> {{ car.year ? car.year : '&#8212;' }} </td>
                      <td v-show="filters.color"> {{ car.color ? car.color : '&#8212;' }} </td>
                      <td v-show="filters.audiosystem"> {{ car.audiosystem ? '&#10004;' : typeof car.audiosystem === 'object' ? '&#8212;' : '&#10006;'}} </td>
                  </tr>
              </table>
          </div>
      </div>
      <div class="col">
          <div class="row">
              <checkbox name="model" :checked="filters.model" v-model="filters.model">Model</checkbox>
              <checkbox name="year" :checked="filters.year" v-model="filters.year">Year</checkbox>
              <checkbox name="color" :checked="filters.color" v-model="filters.color">Color</checkbox>
              <checkbox name="audiosystem" :checked="filters.audiosystem" v-model="filters.audiosystem">Audiosystem</checkbox>

              <base-select name="filter" :select-list="colorsList" v-model="filters.colorFilter">Color: </base-select>
          </div>
          <div class="row">
              <button @click="getCars">Add cars</button>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios';
import Checkbox from "@/components/UI/Checkbox";
import BaseSelect from "@/components/UI/BaseSelect";
export default {
  name: 'app',
  data() {
    return {
      cars: [],
      filters: {
        model: true,
        year: true,
        color: true,
        audiosystem: true,
        colorFilter: ''
      }
    }
  },
  components: {
    Checkbox,
    BaseSelect
  },
  mounted() {
    this.getCars();
  },
  computed: {
    carsList() {
          return this.filters.colorFilter ? this.cars.filter(el => el.color === this.filters.colorFilter) : this.cars;
    },
    colorsList() {
        return [... new Set(this.cars.map(el => el.color).filter(el => !!el))];
    }
  },
  methods: {
    getCars() {
      axios.get("http://localhost/cars.php")
        .then(resp => {
            this.cars.length ? this.cars.push(...resp.data) : this.cars = resp.data;
        })
        .catch(() => alert("An error occurred, contact your administrator."));
    }
  }
}
</script>

<style>
.col {
    width: 50%;
    display: inline-block;
    vertical-align: top;
}

.row {
    text-align: center;
    margin-top: 1em;
    margin-bottom: 1em;
}

.row > * {
    margin: 1em;
}

td, th {
  border: 1px solid black;
  padding: 0.5em;
  text-align: center;
}
</style>

<template>
  <div class="container mt-5">
    <div class="card p-4">
      <h4 class="mb-3">Personal Info</h4>
      <div class="row mt-3">
        <div class="col-12 img-show col-md-6 text-center mb-4">
          <div class="form-group" :style="formgroup">
            <div>
              <div v-if="preview" class="img-container">
                <img :src="preview" class="image" />
                <p class="mb-0">{{ image.name }}</p>
                <i @click="reset" :class="hideBtn" id="clearbtn" class="fas fa-circle-xmark"></i>
              </div>
            </div>
            <div :class="hidetext" id="hide-text">
              <i class="fas fa-cloud-arrow-up mt-4" style="color: #13b955;"></i>
              <p>Upload photo</p>
            </div>
            <div class="">
              <input
                type="file"
                accept="image/*"
                @change="previewImage"
                :class="hideInput"
                id="my-file"
              />
            </div>
          </div>
        </div>
        <div class="col-12 mt-4 col-md-6">
          <label for="" class="form-label">Profession</label>
          <input type="text" name="" id="" class="form-control" placeholder="Junior Developer">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Name</label>
          <input type="text" name="" id="" class="form-control" placeholder="Full name" />
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Email</label>
          <input type="email" name="" id="" class="form-control" placeholder="xxxx@gmail.com" />
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Date of birth</label>
          <input placeholder="month/date/year"  class="form-control" type="text" onfocus="(this.type='date')"/>
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">NRC</label>
          <div class="d-flex justify-content-between">
            <select name="" id="" v-model="selectedValue" class="form-select me-1 w-50">
              <option v-for="index in no" :key="index" :value="index" selected>{{ index }}</option>
            </select>
            <select name="" id="" class="form-select me-1 w-100">
              <option v-for="data in filteredOptions" :key="data" :value="data" selected>{{ data }}</option>
            </select>
            <select name="" id="" v-model="selectedType" class="form-select me-1 w-50">
              <option v-for="index in type" :key="index" :value="index" selected>{{ index }}</option>
            </select>
            <input type="text" name="" id="" class="form-control" placeholder="123456"/>
          </div>
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <div class="">
            <label for="" class="form-label">Phone number</label>
            <input type="text" name="" id="" class="form-control mt-1" placeholder="09xxxxxxxxx" />
          </div>
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Address</label>
          <div class="d-flex justify-content-between">
            <input type="text" name="" id="" class="form-control mt-1 me-1" placeholder="street address"/>
            <input type="text" name="" id="" class="form-control mt-1 me-1" placeholder="City"/>
            <input type="text" name="" id="" class="form-control mt-1" placeholder="Country"/>
          </div>
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Gender</label>
          <div class="mt-2">
            <label for="" class="form-check-label me-3">Male</label>
            <input type="radio" name="" id="" class="form-check-input me-3"/>
            <label for="" class="form-check-label me-3">Female</label>
            <input type="radio" name="" id="" class="form-check-input"/>
          </div>
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Marital Status</label>
          <div class="mt-2">
            <label for="" class="form-check-label me-3">Single</label>
            <input type="radio" name="" id="" class="form-check-input me-3"/>
            <label for="" class="form-check-label me-3">Married</label>
            <input type="radio" name="" id="" class="form-check-input"/>
          </div>
        </div>
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">Skill</label>
          <input type="text" name="" id="" class="form-control" placeholder="HTML,CSS,JavaScript">
        </div>
      </div>
      <h4 class=" mt-5">Education</h4>
      <div class="row mt-3 ">
        <div class="col-md-6 col-12 col-lg-4 mt-3">
          <label for="" class="form-label">High School</label>
          <input type="text" name="" id="" class="form-control" placeholder="High School name">
        </div>
        <div class="col-md-6 col-12 col-lg-8 mt-3">
          <div class="d-flex">
            <div class="me-1 w-50">
              <label for="" class="form-label">Start date</label>
              <input placeholder="month/date/year"  class="form-control" type="text" onfocus="(this.type='date')"/>
            </div>
            <div class="w-50">
              <label for="" class="form-label">End date</label>
              <input placeholder="month/date/year"  class="form-control" type="text" onfocus="(this.type='date')"/>
            </div>
          </div>
        </div>
      </div>
      <div v-for="item,index in university" :key="item">
        <div class="row ">
          <div class="col-md-6 col-12 col-lg-4 mt-3">
            <div class="d-flex justify-content-between">
              <label for="" class="form-label">University {{ index+1 }}</label>
              <div>
                <button @click.prevent="addDegreeRow" class="btn btn-secondary btn-sm me-1"><i class="fas add_remove fa-plus text-success mt-1 " ></i></button>
                <button @click.prevent="removeDegreeRow" class="btn btn-secondary btn-sm"><i class="fas add_remove fa-minus text-danger mt-1" ></i></button>
              </div>
            </div>
            <input type="text" name="" id="" class="form-control" placeholder="Degree name" v-model="item.degree_name">
          </div>
          <div class="col-md-6 col-12 col-lg-8 mt-3">
            <div class="d-flex">
              <div class="me-1 w-50">
                <label for="" class="form-label">Start date</label>
                <input placeholder="month/date/year"  class="form-control" type="text" v-model="item.start_date" onfocus="(this.type='date')"/>
              </div>
              <div class="w-50">
                <label for="" class="form-label">End date</label>
                <input placeholder="month/date/year"  class="form-control" type="text" v-model="item.end_date" onfocus="(this.type='date')"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h4 class="mt-5">Experience</h4>
      <div v-for="item,index in experience" :key="item">
        <div class="row ">
          <div class="col-md-6 col-12 col-lg-4 mt-3">
            <div class="d-flex justify-content-between">
              <label for="" class="form-label">Company {{ index+1 }}</label>
              <div>
                <button @click.prevent="addExperienceRow" class="btn btn-secondary btn-sm me-1"><i class="fas add_remove fa-plus text-success mt-1 " ></i></button>
                <button @click.prevent="removeExperienceRow" class="btn btn-secondary btn-sm"><i class="fas add_remove fa-minus text-danger mt-1" ></i></button>
              </div>
            </div>
            <input type="text" name="" id="" class="form-control" placeholder="Degree name" v-model="item.company">
          </div>
          <div class="col-md-6 col-12 col-lg-4 mt-3">
            <label for="" class="form-label">Position</label>
            <input type="text" name="" id="" class="form-control" placeholder="Position" v-model="item.position">
          </div>
          <div class="col-md-6 col-12 col-lg-4 mt-3">
            <div class="d-flex">
              <div class="me-1 w-50">
                <label for="" class="form-label">Start date</label>
                <input placeholder="month/date/year"  class="form-control" type="text" v-model="item.start_date" onfocus="(this.type='date')"/>
              </div>
              <div class="w-50">
                <label for="" class="form-label">End date</label>
                <input placeholder="month/date/year"  class="form-control" type="text" v-model="item.end_date" onfocus="(this.type='date')"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive } from 'vue'
export default {
  data: function () {
    return {
      preview: null,
      image: null,
      hideInput: "form-control-sm form-control w-100",
      hideBtn: "btn btn-danger btn-sm d-none",
      hidetext: "",
      formgroup: "border:3px dashed #13b955; border-radius: 20px",
      no:["1/","2/","3/","4/","5/","6/","7/","8/","10/","11/","12/","13/","14/"],
      state:{
      "1/":["BaMaNa","KhaHpaNa","DaHpaYa","HaPaNa","HpaKaNa","HaGaYa","KaMaTa","KaPaTa","KhaLaHpa",
      "LaGaNa","MaKhaBa","MaSaNa","MaKaTa","MaNyaNa","MaMaNa","MaKaNa","MaLaNa","NaMaNa","PaWaNa",
      "PaNaDa","PaTaAh","SaDaNa","YaBaYa","YaKaNa","SaBaNa","SaPaBa","SaPaYa","TaNaNa","SaLaNa","TaSaLa","WaMaNa"],
      "2/":["BaLaKha","DaMaSa","HpaSaNa","HpaSaYa","LaKaNa","MaSaNa","YaTaNa","YaThaNa"],
      "3/":["BaGaLa","LaBaNa","BaAhNa","HpaPaNa","BaThaSa","KaMaMa","KaKaYa","KaDaNa","KaSaKa","KaDaNa","KaDaTa","LaThaNa","MaWaTa","PaKaNa","YaYaTha","SaKaLa","ThaTaNa","ThaTaKa","WaLaMa"],
      "4/":["PaNaDa","PaTaAh","SaDaNa","YaBaYa","YaKaNa","SaBaNa"],
      "5/":["KaPaTa","KhaLaHpa",
      "LaGaNa","MaKhaBa","MaSaNa","MaKaTa","MaNyaNa","MaMaNa","MaKaNa","MaLaNa","NaMaNa"],
      "6/":["BaLaKha","DaMaSa","HpaSaNa","HpaSaYa","LaKaNa","MaSaNa","YaTaNa","YaThaNa"],
      "7/":["KhaHpaNa","DaHpaYa","HaPaNa","HpaKaNa","HaGaYa","KaMaTa","KaPaTa","KhaLaHpa",
            "LaGaNa","MaKhaBa","MaSaNa"],
      "8/":["PaNaDa","PaTaAh","SaDaNa","HpaSaYa","LaKaNa","MaSaNa","YaTaNa","YaThaNa"],
      "9/":["PaTaAh","SaDaNa","YaBaYa","BaLaKha","DaMaSa","HpaSaNa","HpaSaYa","LaKaNa","MaSaNa","YaTaNa","YaThaNa"],
      "10/":["MaSaNa","YaTaNa","YaThaNa",],
      "11/":["KaMaMa","KaKaYa","KaDaNa","KaSaKa","KaDaNa","KaDaTa","LaThaNa","MaWaTa","PaKaNa","YaYaTha","SaKaLa","ThaTaNa","ThaTaKa","WaLaMa"],
      "12/":["MaKhaBa","MaSaNa","MaKaTa","MaNyaNa","MaMaNa","MaKaNa","MaLaNa","NaMaNa","PaWaNa",
      "PaNaDa","PaTaAh","SaDaNa","YaBaYa","YaKaNa"],
      "13/":["MaKhaBa","MaSaNa","MaKaTa","MaNyaNa","MaMaNa","MaKaNa","MaLaNa","NaMaNa","PaWaNa",
      "PaNaDa","PaTaAh","SaDaNa","YaBaYa","YaKaNa","SaBaNa","SaPaBa","SaPaYa","TaNaNa","SaLaNa","TaSaLa","WaMaNa"],
      "14/":["BaLaKha","DaMaSa","HpaSaNa","HpaSaYa","LaKaNa","MaSaNa","YaTaNa","YaThaNa"]
      },
      type:["(N)","(Guest)","(P)","(Temp)","(C)","(Tha)"],
      selectedValue:"",
      selectedType:"",
      selectedState:"",
      university:reactive([{
        degree_name:"",
        start_date:"",
        end_date:""
      }]),
      experience:reactive([{
        position:"",
        company:"",
        start_date:"",
        end_date:""
      }])
    };
  },
  computed:{
    filteredOptions() {
      if (this.selectedValue) {
        return this.state[this.selectedValue];
      }
      return [];
    }
  },
  mounted(){
    this.selectedValue = this.no[0];
    this.selectedType = this.type[0];
  },
  methods: {
    previewImage: function (event) {
      var input = event.target;
      if (input.files) {
        var reader = new FileReader();
        reader.onload = (e) => {
          this.preview = e.target.result;
        };
        this.image = input.files[0];
        reader.readAsDataURL(input.files[0]);
        this.hideInput = "form-control-sm form-control d-none";
        this.hideBtn = "text-danger";
        this.hidetext = "d-none";
        this.formgroup = "border:none";
      }
    },
    reset: function () {
      this.image = null;
      this.preview = null;
      document.getElementById("my-file").value = "";
      this.hideInput = "form-control-sm form-control";
      this.hideBtn = "text-danger d-none";
      this.hidetext = "";
      this.formgroup = "border: 3px dashed #13b955; border-radius: 20px";
    },
    addDegreeRow:function(){
      this.university.push({degree_name : "", start_date : "", end_date : ""});
    },
    removeDegreeRow:function(index){
      if(this.university.length>1){
        this.university.splice(index,1);
      }
    },
    addExperienceRow:function(){
      this.experience.push({
        position:"",
        company:"",
        start_date:"",
        end_date:""})
    },
    removeExperienceRow:function(index){
      if(this.experience.length>1){
        this.experience.splice(index,1);
      }
    }
  },
};
</script>

<style scoped>
.image {
  width: auto;
  height: 150px;
  border-radius: 20px;
  object-fit: fill;
}
.img-container {
  position: relative;
}

#clearbtn {
  position: absolute;
  top: 5px;
  right: 5px;
  font-size: larger;
}
.form-group {
  height: 150px;
  position: relative;
  cursor: pointer;
}
#my-file {
  height: 145px;
  opacity: 0;
  z-index: 1000;
}
#hide-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.add_remove{
  cursor: pointer;
  font-size: larger;
}
</style>
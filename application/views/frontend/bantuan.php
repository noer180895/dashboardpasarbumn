<style type="text/css">
body {
  color: #2c3e50;
  background: #ecf0f1;
}
h1 {
  text-align: center;
}
.half {
  float: left;
  width: 100%;
  padding: 0 1em;
}
/* Acordeon styles */
.tab {
  position: relative;
  margin-bottom: 1px;
  width: 100%;
  color: #fff;
  overflow: hidden;
}
input {
  position: absolute;
  opacity: 0;
  z-index: -1;
}
label {
  position: relative;
  display: block;
  padding: 0 0 0 1em;
  background: #16a085;
  font-weight: bold;
  line-height: 3;
  cursor: pointer;
}
.blue label {
  background: #2980b9;
}
.tab-content {
  max-height: 0;
  overflow: hidden;
  background: #1abc9c;
  -webkit-transition: max-height .35s;
  -o-transition: max-height .35s;
  transition: max-height .35s;
}
.blue .tab-content {
  background: #29aeb5;
}
.tab-content p {
  margin: 1em;
}
/* :checked */
input:checked ~ .tab-content {
  max-height: 10em;
}
/* Icon */
label::after {
  position: absolute;
  right: 0;
  top: 0;
  display: block;
  width: 3em;
  height: 3em;
  line-height: 3;
  text-align: center;
  -webkit-transition: all .35s;
  -o-transition: all .35s;
  transition: all .35s;
}
input[type=checkbox] + label::after {
  content: "+";
}
input[type=radio] + label::after {
  content: "\25BC";
}
input[type=checkbox]:checked + label::after {
  transform: rotate(315deg);
}
input[type=radio]:checked + label::after {
  transform: rotateX(180deg);
}

}
</style>
 <div class="space"></div>
 <br /><br />


    <section class="popular-inner">
        <div class="container">
      
            <div class="col-sm-12">
                <div class="panel">
                    <h1>Help </h1>
                    <hr/>
                    <div class="half">
                      <?php $no=1; $tab = 'tab-'; foreach ($data_help as $data) { ?>
                        <div class="tab blue">
                          <input id="<?php echo '.' . $tab . $no . '.'; ?>" type="radio" name="tabs2">
                          <label for="<?php echo '.' . $tab . $no . '.'; ?>"><?php echo $data->question; ?></label>
                          <div class="tab-content">
                            <p style="color: #ffffff;"><?php echo $data->answer; ?></p>
                          </div>
                        </div>
                      <?php $no++; } ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>
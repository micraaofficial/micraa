<!DOCTYPE html>
<html>
<head>

<title>Edit Taskbit - Micraa</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Inter', sans-serif;
background:#f6f7fb;
}

.form-group,
.form-control,
.select2-container {
    width: 100% !important;
}

input,
select,
textarea {
    width: 100% !important;
    box-sizing: border-box;
}

.page{
max-width:850px;
margin:60px auto;
padding:0 15px;
}

.title{
font-size:28px;
font-weight:600;
margin-bottom:30px;
}

.card{
background:white;
padding:35px;
border-radius:12px;
box-shadow:0 8px 25px rgba(0,0,0,0.05);
width:100%;
box-sizing:border-box;
}

.form-group{
margin-bottom:24px;
}

label{
display:block;
font-size:16px;
font-weight:500;
margin-bottom:10px;
}

input, textarea, select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:8px;
font-family:'Inter';
font-size:15px;
}

textarea{
resize:none;
height:120px;
line-height:1.6;
}

/* UPLOAD BUTTON */
.upload-btn{
display:inline-block;
padding:10px 16px;
background:#f3f4f6;
border:1px solid #ddd;
border-radius:6px;
cursor:pointer;
font-size:14px;
}

.upload-btn input{
display:none;
}

.preview{
margin-top:10px;
width:200px;
border-radius:8px;
display:block;
}

/* BUTTON */
.button{
background:#16a34a;
color:white;
padding:14px 22px;
border:none;
border-radius:8px;
cursor:pointer;
}

.button:hover{
background:#15803d;
}

/* TAG UI */
.tag{
display:inline-block;
background:#e5e7eb;
padding:6px 10px;
border-radius:6px;
margin:4px;
font-size:13px;
}

.tag span{
margin-left:6px;
cursor:pointer;
color:red;
}

#tagContainer{
display:flex;
flex-wrap:wrap;
gap:6px;
margin-top:10px;
}

</style>

</head>

<body>

<div class="page">

<div class="title">Edit Taskbit</div>

<div class="card">

<form method="POST" action="/update-taskbit/<?php echo e($service->id); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<!-- TITLE -->
<div class="form-group">
<label>Title</label>
<input type="text" name="title" value="<?php echo e($service->title); ?>">
</div>

<!-- DESCRIPTION -->
<div class="form-group">
<label>Description</label>
<textarea name="description"><?php echo e($service->description); ?></textarea>
</div>

<!-- IMAGE 1 -->
<div class="form-group">
<label>Image 1</label>

<?php if($service->image1): ?>
    <img id="preview1" class="preview" src="<?php echo e(asset('storage/'.$service->image1)); ?>">
<?php endif; ?>

<label class="upload-btn">
⬆ Upload Image
<input type="file" name="image1" onchange="previewImage(event,'preview1')">
</label>

<div style="font-size:13px;color:#777;margin-top:5px;">Recommended size: 1200 × 840 px</div>
</div>

<!-- IMAGE 2 -->
<div class="form-group">
<label>Image 2</label>

<?php if($service->image2): ?>
    <img id="preview2" class="preview" src="<?php echo e(asset('storage/'.$service->image2)); ?>" style="display:block;">
<?php endif; ?>

<label class="upload-btn">
⬆ Upload Image
<input type="file" name="image2" onchange="previewImage(event,'preview2')">
</label>
</div>

<!-- IMAGE 3 -->
<div class="form-group">
<label>Image 3</label>

<?php if($service->image3): ?>
    <img id="preview3" class="preview" src="<?php echo e(asset('storage/'.$service->image3)); ?>" style="display:block;">
<?php endif; ?>

<label class="upload-btn">
⬆ Upload Image
<input type="file" name="image3" onchange="previewImage(event,'preview3')">
</label>
</div>

<!-- PRICE -->
<div class="form-group">
<label>Price ($)</label>
<input type="number" name="price" value="<?php echo e($service->price); ?>">
</div>

<!-- DELIVERY -->
<div class="form-group">
<label>Delivery Time (days)</label>
<input type="number" name="delivery_time" value="<?php echo e($service->delivery_time); ?>">
</div>

<!-- CATEGORY -->
<div class="form-group">
<label>Category</label>
<select name="category">
<option>Micro Services</option>
</select>
</div>

<!-- SUBCATEGORY -->
<div class="form-group">
<label>Subcategory</label>
<select name="subcategory" id="subcategory">

<option value="ai" <?php echo e($service->subcategory_id == 'ai' ? 'selected' : ''); ?>>AI Services Task</option>
<option value="design" <?php echo e($service->subcategory_id == 'design' ? 'selected' : ''); ?>>Graphic Design Task</option>
<option value="image" <?php echo e($service->subcategory_id == 'image' ? 'selected' : ''); ?>>Image Editing Task</option>
<option value="social" <?php echo e($service->subcategory_id == 'social' ? 'selected' : ''); ?>>Social Media Task</option>
<option value="seo" <?php echo e($service->subcategory_id == 'seo' ? 'selected' : ''); ?>>SEO Task</option>
<option value="writing" <?php echo e($service->subcategory_id == 'writing' ? 'selected' : ''); ?>>Writing Task</option>
<option value="ecommerce" <?php echo e($service->subcategory_id == 'ecommerce' ? 'selected' : ''); ?>>Ecommerce Task</option>
<option value="website" <?php echo e($service->subcategory_id == 'website' ? 'selected' : ''); ?>>Website Task</option>
<option value="marketing" <?php echo e($service->subcategory_id == 'marketing' ? 'selected' : ''); ?>>Marketing Task</option>
<option value="data" <?php echo e($service->subcategory_id == 'data' ? 'selected' : ''); ?>>Data Entry Task</option>

</select>
</div>

<!-- MICRO -->
<div class="form-group">
<label>Micro Category</label>

<select name="microcategory_id" id="microcategory">
    <option value="<?php echo e($service->microcategory_name); ?>" selected>
        <?php echo e($service->microcategory_name); ?>

    </option>
</select>

</div>

<!-- TAGS -->
<div class="form-group">
<label>Tags (5 required)</label>

<input type="text" id="tagInput" placeholder="Type tag and press Enter">

<div id="tagContainer"></div>

<input type="hidden" name="tags" id="tags" value="<?php echo e($service->tags); ?>">
</div>

<button class="button">Update Taskbit</button>

</form>

</div>

</div>

<script>

// IMAGE PREVIEW
function previewImage(event,id){
const reader = new FileReader();
reader.onload = function(){
document.getElementById(id).src = reader.result;
}
reader.readAsDataURL(event.target.files[0]);
}

// FULL MICRO DATA
const microcategories = {
design:["Minimal logo design","Remove background from image","Resize image for social media","Convert image PNG to JPG","Add watermark to image","YouTube thumbnail design","Instagram post design","Facebook cover design","Vector tracing simple logo","Convert logo to SVG"],
ai:["Generate AI blog ideas","AI product description","AI Instagram captions","AI YouTube title ideas","AI prompt writing"],
image:["Remove background from photo","Resize image for website","Compress image for web"],
social:["Instagram post design","Facebook cover design"]
};

// LOAD MICRO
function loadMicroCategories(){
let sub = document.getElementById("subcategory").value;
let micro = document.getElementById("microcategory");

micro.innerHTML="";

if(!microcategories[sub]) return;

microcategories[sub].forEach(item=>{
let option=document.createElement("option");
option.value=item;
option.text=item;

if(item === "<?php echo e($service->microcategory); ?>"){
option.selected = true;
}

micro.appendChild(option);
});
}

document.getElementById("subcategory").addEventListener("change", loadMicroCategories);

// TAG SYSTEM
let tags = "<?php echo e($service->tags); ?>".split(',').filter(t=>t);

const input = document.getElementById("tagInput");
const container = document.getElementById("tagContainer");
const hidden = document.getElementById("tags");

function renderTags(){
container.innerHTML="";
tags.forEach((tag,index)=>{
let div=document.createElement("div");
div.className="tag";
div.innerHTML = tag + ' <span onclick="removeTag('+index+')">×</span>';
container.appendChild(div);
});
hidden.value = tags.join(",");
}

function removeTag(index){
tags.splice(index,1);
renderTags();
}

input.addEventListener("keypress", function(e){
if(e.key==="Enter"){
e.preventDefault();

if(tags.length>=5){
alert("Only 5 tags allowed");
return;
}

let val=input.value.trim();
if(val && !tags.includes(val)){
tags.push(val);
renderTags();
input.value="";
}
}
});

renderTags();

</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\micraa\micraa\resources\views/edit-taskbit.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html>
<head>
<title>Create Taskbit - Micraa</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
margin:0;
font-family:'Inter', sans-serif;
background:#f6f7fb;
}

/* FIXED ALIGNMENT */
.page{
max-width:720px;
margin:60px auto;
padding:0 20px;
}

.title{
font-size:28px;
font-weight:600;
margin-bottom:30px;
}

.card{
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 8px 25px rgba(0,0,0,0.05);
width:100%;
}

/* FIX GAP ISSUE */
*{
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
font-size:15px;
}

textarea{
height:120px;
}

.upload-btn{
display:inline-block;
padding:10px 16px;
background:#f3f4f6;
border:1px solid #ddd;
border-radius:6px;
cursor:pointer;
}

.upload-btn input{
display:none;
}

.preview{
margin-top:10px;
width:200px;
border-radius:8px;
display:none;
}

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

.error{
color:red;
margin-top:6px;
font-size:14px;
}
</style>

</head>

<body>

<div class="page">
<div class="title">Create Taskbit</div>

<div class="card">

<form method="POST" action="/create-taskbit" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<!-- TITLE -->
<div class="form-group">
<label>Title</label>
<input type="text" name="title" value="<?php echo e(old('title')); ?>">
</div>

<!-- DESCRIPTION -->
<div class="form-group">
<label>Description</label>
<textarea name="description"><?php echo e(old('description')); ?></textarea>
</div>

<!-- IMAGE -->
<div class="form-group">
<label>Image 1</label>
<img id="preview1" class="preview">
<label class="upload-btn">
Upload Image
<input type="file" name="image1" onchange="previewImage(event,'preview1')">
</label>
</div>

<!-- IMAGE 2 -->
<div class="form-group">
<label>Image 2</label>
<img id="preview2" class="preview">
<label class="upload-btn">
Upload Image
<input type="file" name="image2" onchange="previewImage(event,'preview2')">
</label>
</div>

<!-- IMAGE 3 -->
<div class="form-group">
<label>Image 3</label>
<img id="preview3" class="preview">
<label class="upload-btn">
Upload Image
<input type="file" name="image3" onchange="previewImage(event,'preview3')">
</label>
</div>

<!-- PRICE -->
<div class="form-group">
<label>Price ($)</label>
<input type="number" name="price" value="<?php echo e(old('price',1)); ?>">
</div>

<!-- DELIVERY -->
<div class="form-group">
<label>Delivery Time (days)</label>
<input type="number" name="delivery_time" value="<?php echo e(old('delivery_time',1)); ?>">
</div>

<!-- CATEGORY -->
<div class="form-group">
<label>Category</label>
<select>
<option>Micro Services</option>
</select>
</div>

<!-- SUBCATEGORY -->
<div class="form-group">
<label>Subcategory</label>
<select name="subcategory_id" id="subcategory">
<option value="">Select Subcategory</option>
<option value="1">AI Services Task</option>
<option value="2">Graphic Design Task</option>
<option value="3">Image Editing Task</option>
<option value="4">Social Media Task</option>
<option value="5">SEO Task</option>
<option value="6">Writing Task</option>
<option value="7">Ecommerce Task</option>
<option value="8">Website Task</option>
<option value="9">Marketing Task</option>
<option value="10">Data Entry Task</option>
</select>
</div>

<!-- MICRO CATEGORY -->
<div class="form-group">
<label>Micro Category</label>
<select name="microcategory_id" id="microcategory">
<option>Select Micro Category</option>
</select>
</div>

<!-- TAGS -->
<div class="form-group">
<label>Tags (5 required)</label>
<input type="text" id="tagInput" placeholder="Type tag and press Enter">
<div id="tagContainer"></div>

<input type="hidden" name="tags" id="tags" value="<?php echo e(old('tags')); ?>">

<?php if($errors->has('tags')): ?>
<div class="error"><?php echo e($errors->first('tags')); ?></div>
<?php endif; ?>

</div>

<button class="button">Create Taskbit</button>

</form>

</div>
</div>

<script>

// IMAGE PREVIEW
function previewImage(event,id){
const reader = new FileReader();
reader.onload = function(){
let img = document.getElementById(id);
img.src = reader.result;
img.style.display = "block";
}
reader.readAsDataURL(event.target.files[0]);
}

// TAG SYSTEM
let tags = [];
let oldTags = document.getElementById("tags").value;

if(oldTags){
tags = oldTags.split(",");
renderTags();
}

function renderTags(){
let container = document.getElementById("tagContainer");
container.innerHTML="";
tags.forEach((tag,index)=>{
container.innerHTML += `<div class="tag">${tag} <span onclick="removeTag(${index})">×</span></div>`;
});
document.getElementById("tags").value = tags.join(",");
}

function removeTag(index){
tags.splice(index,1);
renderTags();
}

document.getElementById("tagInput").addEventListener("keypress", function(e){
if(e.key==="Enter"){
e.preventDefault();
if(tags.length>=5){ alert("Only 5 tags allowed"); return; }
let val=this.value.trim();
if(val && !tags.includes(val)){
tags.push(val);
renderTags();
this.value="";
}
}
});

// FULL MICRO DATA
const microcategories = {
1:[ "Generate AI blog ideas","AI product description","AI Instagram captions","AI YouTube title ideas","AI prompt writing","AI logo idea generation","AI marketing slogan","AI social media post","AI blog outline","AI hashtag list"],
2:[ "Minimal logo design","Remove background from image","Resize image for social media","Convert image PNG to JPG","Add watermark to image","YouTube thumbnail design","Instagram post design","Facebook cover design","Vector tracing simple logo","Convert logo to SVG"],
3:[ "Remove background from photo","Resize image for website","Compress image for web","Convert image PDF to JPG","Convert image JPG to PNG","Crop image perfectly","Add watermark to photo","Photo color correction","Remove object from photo","Old photo restoration"],
4:[ "Instagram post design","Facebook cover design","YouTube thumbnail design","LinkedIn banner design","Pinterest pin design","Instagram caption writing","YouTube title ideas","Hashtag research for Instagram","TikTok caption writing","Social media post resizing"],
5:[ "Write SEO meta title","Write SEO meta description","Keyword research for blog","Generate SEO keywords list","Write image alt text","Create SEO slug for page","Internal link suggestions","Basic SEO audit checklist","Generate blog title ideas","Optimize article keywords"],
6:[ "Write 100 word blog post","Write product short description","Rewrite paragraph","Grammar correction","Proofreading text","Write YouTube title","Write YouTube description","Write Instagram bio","Write TikTok caption","Rewrite product title"],
7:[ "Upload product to Shopify","Upload product to WooCommerce","Amazon product listing","Etsy product listing","Write product title","Product tag research","Rewrite product description","Resize product images","Remove background from product photo","Add product SKU and variations"],
8:[ "Fix small CSS issue","Change website text","Add favicon to website","Compress website images","Add meta tags to website","Fix mobile responsive issue","Install WordPress plugin","Install WordPress theme","Add Google Analytics to website","Add social media links to website"],
9:[ "Social media marketing plan","Facebook ad copy writing","Google ad headline writing","Instagram marketing strategy","YouTube tag research","Email subject line writing","Marketing slogan creation","Competitor marketing analysis","Lead generation list","Content marketing ideas"],
10:[ "Copy paste data entry","Convert PDF to Word","Convert PDF to Excel","Convert Word to PDF","Web data collection","Email list building","Excel data formatting","Clean spreadsheet data","Rename image files","Organize data in spreadsheet"]
};

document.getElementById("subcategory").addEventListener("change", function(){
let subId = this.value;
let micro = document.getElementById("microcategory");

micro.innerHTML = '<option>Select Micro Category</option>';

if(!microcategories[subId]) return;

microcategories[subId].forEach(item=>{
let opt=document.createElement("option");
opt.value=item;
opt.text=item;
micro.appendChild(opt);
});
});

</script>

</body>
</html>
<?php /**PATH /home/u178846379/domains/micraa.com/public_html/resources/views/taskbits/create.blade.php ENDPATH**/ ?>
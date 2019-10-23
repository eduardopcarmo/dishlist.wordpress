<?php
get_header();
?>
<h1>H1</h1>
<h2>H2</h2>
<p>Paragraph</p>
<h1 class="section-title">section-title</h1>
<br>
<br>
<button class="btn btn-primary">btn btn-primary</button>
<br>
<button class="btn btn-secondary">btn btn-secondary</button>
<br>
<button class="btn btn-outline-primary">btn btn-outline-primary</button>
<br>
<button class="btn btn-outline-secondary">btn btn-outline-secondary</button>
<br>
<br>
<br>
<form class="form" action="#">
    <div class="form-group">
        <label>label <span>*<span></label>
        <input type="text" name="" placeholder="text">
        <span>Error Message<span>
    </div>
    <div class="form-group">
        <label>label</label>
        <textarea name="" rows="4" placeholder="text"></textarea>
    </div>
    <div class="form-group show-error">
        <label>label <span>*</span> <em>Error Message</em></label>
        <input type="text" name="" placeholder="text">
    </div>
</form>

<?php
get_footer();
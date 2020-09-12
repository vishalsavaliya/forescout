<!-- SECTION -->
<style>
    .alert {
        padding: 20px;
        background-color: #4BB543;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<section class="parallax fullscreen" style="background-image: url(<?= base_url() ?>front_assets/images/bg_login.jpg); top: 0; padding-top: 0px;">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <?php if ($this->session->flashdata('msg') != "") { ?>
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                    <strong><?php echo ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?></strong> 
                </div>
            <?php } ?>
        </div>
    </div>
</section>



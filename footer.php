<?php
/**
 * Footer template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    $footer_class = 'page-footer';
    $footer_class .= (defined('FOOTER_ALT_CLASS')) ? ' page-footer--alt' : '';
?>

        <footer id="page-footer" class="<?= $footer_class ?>">
            <?php 
                get_template_part('src/views/partials/footer', 'upper'); 
                get_template_part('src/views/partials/footer', 'lower'); 
            ?>
        </footer>
        <?php if ( ! is_user_logged_in() ) : ?>
        <setion class="user-login">
            <div class="user-login__wrapper">
            
            <div class="user-login__close">
                <button aria-label="Close" type="button" tabindex="-1" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><defs><filter id="close_svg__a" width="136.7%" height="135.5%" x="-18.3%" y="-17.8%" filterUnits="objectBoundingBox"><feMorphology in="SourceAlpha" operator="dilate" radius="9" result="shadowSpreadOuter1"></feMorphology><feOffset dx="2" dy="12" in="shadowSpreadOuter1" result="shadowOffsetOuter1"></feOffset><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="14"></feGaussianBlur><feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"></feColorMatrix><feMerge><feMergeNode in="shadowMatrixOuter1"></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter></defs><g fill-rule="evenodd" filter="url(#close_svg__a)" transform="translate(-421 -24)"><path d="m439.77 28 1.23 1.23-6.77 6.77 6.77 6.77-1.23 1.23-6.77-6.77-6.77 6.77-1.23-1.23 6.769-6.77L425 29.23l1.23-1.23 6.77 6.769L439.77 28z"></path></g></svg>
                </button>
            </div>
            
                <div class="user-login__container">
                    <div class="user-login__form">

                    
                        <div id="singleSign" class="user-login__form-single-signon">

                        <div class="user-login__header">

                    
                        <h2>Sign Up</h2>
                            <p>Already a member? <a id="toLogIn" href="#">Log In</a></p>
                        </div>

                    
                        <!-- Google Button -->
                        <?php echo do_shortcode('[nextend_social_login provider="google" style="button" login="1"]'); ?>

                
                        <div class="user-login__divider">
                            <span>or</span>
                        </div>

                        <!-- Email Sign up -->
                         <button id="signupemailForm">Sign up with email</button>
                        

                        </div>

                        <div id="singleLogin" class="user-login__form-single-signon">

                            <div class="user-login__header">


                            <h2>Log In</h2>
                                <p>New to this site? <a id="toSignup" href="#">Sign Up</a></p>
                            </div>


                            <!-- Google Button -->
                            <?php echo do_shortcode('[nextend_social_login provider="google" style="button" login="1"]'); ?>


                            <div class="user-login__divider">
                                <span>or</span>
                            </div>

                            <!-- Email Sign up -->
                            <button id="loginwEmail">Log in with email</button>


                            </div>

                        <div id="signupEmail" class="user-login__form-single-email">

                            <div class="user-login__header">


                            <h2>Sign Up</h2>
                                <p>Already a member? <a id="toLogIn2" href="#">Log In</a></p>
                            </div>


                            <!-- Google Button -->
                            <?php echo do_shortcode('[forminator_form id="1206"]'); ?>


                            <div class="user-login__divider">
                                <span>or log in with</span>
                            </div>

                         <ul>
                            <li>
                            <?php echo do_shortcode('[nextend_social_login provider="google" style="icon"]');?>
                            </li>
                         </ul>


                            </div>

                        <div id="loginEmail" class="user-login__form-login">
                            <div class="user-login__header">
                                <h2>Log <Inp></Inp></h2>
                                <p>New to this site?  <a id="backtoSignup" href="#">Sign Up</a></p>
                            </div>
                            <?php echo wp_login_form(); ?>
                        </div>

                    </div>
                <!-- Checkbox -->
                <label class="public-profile">
                    <input type="checkbox" checked> Sign up to this site with a public profile.
                    <a href="#">Read more</a>
                </label>
                </div>
            </div>
        </setion>
        <?php endif; ?>

    </div> <!-- page main wrapper -->
    <div class="non_visual_wrapper opt__step">
        <?php get_template_part('src/views/partials/footer', 'body-end'); ?>
        <?php wp_footer(); ?>
    </div>
</body>
</html>
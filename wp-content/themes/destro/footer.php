

                </div>	
                <!-- Content Section ends here -->	
                
                <!-- Footer Section starts here -->
                <div id="footer_section">
                    Long Live 7~11
                 </div>	
                 <!-- Footer Section ends here -->	
                                                              
			</div>	
			<!-- Wrapper two ends here -->	
            
		</div>	
		<!-- Wrapper three ends here -->           
	</div>	
	<!-- Wrapper four ends here -->	            				
	</div>	
	<!-- Wrapper one ends here -->	


<?php 
	if ( of_get_option('twitter_id') ){
	echo Destro_twitter_script('1985',of_get_option('twitter_id'),2); //Javascript output function 
	}
?>
<?php wp_footer(); ?>
</body>
</html>
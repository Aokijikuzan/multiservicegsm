<script type="text/javascript">
 
        $(document).ready(function(){
 
            // Smart Wizard
 
            $('#smartwizard').smartWizard({
 
                    selected: 0,
 
                    theme: 'circles',
 
                    transitionEffect:'slide',
 
                    toolbarSettings: {toolbarPosition: 'both',
 
                                      toolbarExtraButtons: [
 
                                            {label: 'Finish', css: 'btn-success', onClick: function(){ alert('Finish Clicked'); }},
 
                                            {label: 'Cancel', css: 'btn-warning', onClick: function(){ $('#smartwizard').smartWizard("reset"); }}
 
                                        ]
 
                                    }
 
                 });
 
 
            // External Button Events
 
            $("#reset-btn").on("click", function() {
 
                // Reset wizard
 
                $('#smartwizard').smartWizard("reset");
 
                return true;
 
            });
 
 
 
            $("#prev-btn").on("click", function() {
 
                // Navigate previous
 
                $('#smartwizard').smartWizard("prev");
 
                return true;
 
            });
 
 
 
            $("#next-btn").on("click", function() {
 
                // Navigate next
 
                $('#smartwizard').smartWizard("next");
 
                return true;
 
            });
 
 
 
                $('#smartwizard').smartWizard("theme", "circles");
 
 
 
        });  
</script>
 
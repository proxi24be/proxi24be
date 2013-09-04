<?php

class ModalWidget extends CWidget
{
	public $id;
	public $modal_title;
	public $content_footer;

	public function init()
    {
        // this method is called by CController::beginWidget()
    	$html = sprintf('<div id="%s" class="modal fade">', $this->id);    
    	$html .= '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
    	$html .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    	$html .= sprintf('<h4 class="modal-title">%s</h4>', $this->modal_title);
    	$html .= '</div><div class="modal-body">';
    	echo $html;
    }    
 
    public function run()
    {
        // this method is called by CController::endWidget()
        $html = '</div> <!-- /.model-body -->';
        $html .='<div class="modal-footer">';
        $html .=sprintf('%s', isset($this->content_footer) ? $this->content_footer : '');
        $html .='</div>';  
        $html .='</div><!-- /.modal-content -->
        	</div><!-- /.modal-dialog -->
        	</div><!-- /.modal -->';
    	echo $html;
    }
}
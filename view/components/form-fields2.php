<?php 

function textInput($edit, $original, $camel_case, $kebab_case, $placeholder, $value, $field_status="rejected") { //bk-changed
    $status["approved"] = $status["rejected"] = $status["pending"] = '';
    $status[$field_status] = 'checked';
    $display = ($field_status == 'rejected') ? '' : 'none';
    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <input class="form-control hris-form-control" value="'.  (is_null($value) ? "": $value) .'" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'">
            </div>
            <div class="controls p-0">
            <input type="radio" class="btn-check " name="'. $camel_case .'_status" id="'. $kebab_case .'-approved" autocomplete="off" ' .$status["approved"]. '>
            <label class="btn btn-outline-info border-0 p-0  " for="'. $kebab_case .'-approved"><i class="fa fa-check mark-right" onclick="approve(`'. $kebab_case. '-reject-reason`)"></i></label>
            <input type="radio" class="btn-check " name="'. $camel_case .'_status" id="'. $kebab_case .'-rejected" autocomplete="off" ' .$status["rejected"]. '>
            <label class="btn btn-outline-info border-0 p-0 " for="'. $kebab_case .'-rejected"><i class="fa fa-times mark-wrong " onclick="reject(`'. $kebab_case. '-reject-reason`)"></i></label>
            <input type="radio" class="btn-check  " name="'. $camel_case .'_status" id="'. $kebab_case .'-pending" autocomplete="off" ' .$status["pending"]. '>
            <label class="btn btn-outline-info p-0 d-none" for="'. $kebab_case .'-pending"><i class="fa fa-question"></i></label>
        </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Previous value - '. $original .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: ' .$display. '">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <input class="form-control hris-form-control" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $placeholder .'" value="'.  (is_null($value) ? "": $value) .'">
    '
    ;
}

function dateInput($edit, $original, $camel_case, $kebab_case, $value) { //?placeholder
    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <input type="date" class="form-control hris-form-control" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'" value="'. (is_null($value) ? "" : $value) .'">
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Previous value - '. $original .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <input type="date" class="form-control hris-form-control" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'" value="'. (is_null($value) ? "" : $value) .'">
    ';
}

function fileInput($edit, $original, $camel_case, $kebab_case) { //BK-changed
    $placeholder = "JPEG, PNG, PDF Only";
    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <div class="stack">
                    <input type="file" class="form-control hris-form-control child" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'">
                    <input type="text" class="form-control hris-form-control child" onclick="openFileInput(this)" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'">
                </div>
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Previous value - '. $original .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <div class="stack">
            <input type="file" class="form-control hris-form-control child" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $placeholder .'">
            <input type="text" class="form-control hris-form-control child" onclick="openFileInput(this)" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $placeholder .'">
        </div>
    ';
}

function select($edit, $original, $camel_case, $kebab_case, $options, $placeholder, $value) {
    $concatOptions = '';

    $concatOptions .= is_null($placeholder) ? '' : '<option value="">'. $placeholder .'</option>'; //bk-changed
    
    foreach($options as $option) {
        if($option["value"] == $value) {
            $concatOptions = $concatOptions . '<option selected value="'. $option["value"] .'">'. $option["name"] .'</option>';
        } else {
            $concatOptions = $concatOptions . '<option value="'. $option["value"] .'">'. $option["name"] .'</option>';
        }
    }

    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <select class="form-control hris-form-control" id="'. $kebab_case .'" name="'. $camel_case .'">
                    '. $concatOptions .'
                </select>
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Previous value - '. $original .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <select class="form-control hris-form-control" id="'. $kebab_case .'" name="'. $camel_case .'">
            '. $concatOptions .'
        </select>
    ';
}

function selectSubject($edit, $original1, $original2, $camel_case, $kebab_case, $options1, $options2, $placeholder, $value1, $value2) {
    $concatOptions1 = $concatOptions2 = '';

    $concatOptions1 .= is_null($placeholder) ? '' : '<option value="">Choose '. $placeholder .'</option>'; //bk-changed
    $concatOptions2 .= is_null($placeholder) ? '' : '<option value="">'. $placeholder .' Result</option>'; //bk-changed
    
    foreach($options1 as $option) {
        $selected = $option["value"] == $value1 ? 'selected ' : '';
        $concatOptions1 .= '<option ' .$selected. 'value="'. $option["value"] .'">'. $option["name"] .'</option>';
    }
    foreach($options2 as $option) {
        $selected = $option["value"] == $value2 ? 'selected ' : '';
        $concatOptions2 .= '<option ' .$selected. 'value="'. $option["value"] .'">'. $option["name"] .'</option>';
    }

    return $edit ? '
            <div class="row">
                <div class="col-5 pr-0">
                    <select class="form-control hris-form-control" id="'. $kebab_case .'" name="'. $camel_case .'">
                        '. $concatOptions1 .'
                    </select>
                </div>
                <div class="col-5 pr-0">
                    <select class="form-control hris-form-control" id="'. $kebab_case .'-result" name="'. $camel_case .'Result">
                        '. $concatOptions2 .'
                    </select>
                </div>
                <div class="col-1 controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
                </div>
            </div>

            <label id="previous-'. $kebab_case. '" class="mt-2">Previous value - '. $original1 .'</label><br>
            <label id="previous-'. $kebab_case. '-result" class="mt-2">Previous value - '. $original2 .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <div class="row">
            <div class="col-6">
                <select class="form-control hris-form-control" id="'. $kebab_case .'" name="'. $camel_case .'">
                    '. $concatOptions1 .'
                </select>
            </div>
            <div class="col-6">
                <select class="form-control hris-form-control" id="'. $kebab_case .'-result" name="'. $camel_case .'Result">
                    '. $concatOptions2 .'
                </select>
            </div>
        </div>
    ';
}

function radioInput($edit, $original, $camel_case, $kebab_case, $value){
    $checked_yes = $value == 'yes' ? 'checked' : '';
    $checked_no = $value == 'no' ? 'checked' : '';
     
    return $edit ? ' ---auditor code to be written---
    ' : '<div></div>
    <div class=" form-check-inline">
    <input id="' .$kebab_case. '-yes" ' .$checked_yes. ' value="yes" class="radio-hris" name="' .$camel_case. '" type="radio">
    <label for="' .$kebab_case. '-yes" class="radio-hris-label">Yes</label>
</div>
<div class="form-check-inline">
    <input id="' .$kebab_case. '-no" ' .$checked_no. ' value="no" class="radio-hris" name="' .$camel_case. '" type="radio">
    <label for="' .$kebab_case. '-no" class="radio-hris-label">No</label>
</div>';
   
}

function checkboxInput($edit, $original, $camel_case, $kebab_case, $value){
    $checked_yes = $value == 'agree' ? 'checked' : '';
    
    return $edit ? ' ---auditor code to be written---
    ' : '
    <input id="' .$kebab_case. '" ' .$checked_yes. ' value="agree" class="checkbox-hris" name="' .$camel_case. '" type="checkbox">
';

}
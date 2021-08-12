<?php 

function textInput($edit, $original, $camel_case, $kebab_case, $value, $prev_value, $disabled, $status = 'rejected', $reason) {
    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <input '. $disabled .' class="form-control hris-form-control" value="'.  (is_null($value) ? "": $value) .'" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'">
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right" onclick="accept(`'. $kebab_case .'`)"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
                <input type="radio" '. ($status === "pending" ? "checked" : "") .' name="'. $camel_case .'Status" value="pending">
                <input type="radio" '. ($status === "approved" ? "checked" : "") .' name="'. $camel_case .'Status" value="approved">
                <input type="radio" '. ($status === "rejected" ? "checked" : "") .' name="'. $camel_case .'Status" value="rejected">
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Last Approved Entry: '. (is_null($prev_value) ? "" : $prev_value) .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" '. ($status === 'rejected' ? 'style="display: block;"' : 'style="display: none;"') .'>
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection">'. $reason .'</textarea>
                </div>
            </div>
        </div>
    ' : '
        <input '. $disabled .' class="form-control hris-form-control" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'" value="'.  (is_null($value) ? "": $value) .'">
    ';
}

function dateInput($edit, $original, $camel_case, $kebab_case, $value, $prev_value, $disabled) {
    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <input '. $disabled .' type="date" class="form-control hris-form-control" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'" value="'. (is_null($value) ? "" : $value) .'">
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Last Approved Entry: '. $prev_value .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <input '. $disabled .' type="date" class="form-control hris-form-control" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'" value="'. (is_null($value) ? "" : $value) .'">
    ';
}

function fileInput($edit, $original, $camel_case, $kebab_case) {
    return $edit ? '
        <div class="form-control-row">
            <div class="field pr-0">
                <div class="stack">
                    <input type="file" class="form-control hris-form-control child" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'">
                    <input type="text" class="form-control hris-form-control child" onclick="openFileInput(this)" id="'. $kebab_case. '" placeholder="'. $original .'">
                </div>
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Last Approved Entry: '. $original .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <div class="stack">
            <input type="file" class="form-control hris-form-control child" id="'. $kebab_case. '" name="'. $camel_case .'" placeholder="'. $original .'">
            <input type="text" class="form-control hris-form-control child" onclick="openFileInput(this)" id="'. $kebab_case. '" placeholder="'. $original .'">
        </div>
    ';
}

function select($edit, $original, $camel_case, $kebab_case, $options, $value, $prev_value, $disabled) {
    $concatOptions = '';

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
                <select '. $disabled .' class="form-control hris-form-control" id="'. $kebab_case .'" name="'. $camel_case .'">
                    '. $concatOptions .'
                </select>
            </div>
            <div class="controls p-0">
                <i class="fa fa-check mark-right"></i>
                <i class="fa fa-times mark-wrong" onclick="reject(`'. $kebab_case. '-reject-reason`)"></i>
            </div>
        </div>
        <label id="previous-'. $kebab_case. '" class="mt-2">Last Approved Entry: '. $original .'</label>
        <div class="row">
            <div id="'. $kebab_case. '-reject-reason" class="reason-form-control col-md-10 col-sm-12" style="display: none;">
                <div class="field pr-0">
                    <textarea class="form-control hris-form-control" id="reason-'. $kebab_case. '" name="'. $camel_case .'RejectReason" placeholder="Reason for rejection"></textarea>
                </div>
            </div>
        </div>
    ' : '
        <select '. $disabled .' class="form-control hris-form-control" id="'. $kebab_case .'" name="'. $camel_case .'">
            '. $concatOptions .'
        </select>
    ';
}
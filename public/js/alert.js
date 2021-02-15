function closeAlert(target_id) {
    let elementId = target_id.split("-")[0] + "-alert";
    document.getElementById(elementId).remove();
}

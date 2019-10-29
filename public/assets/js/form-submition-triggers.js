/**
 * @param {Element} $container
 * @returns {NodeList}
 */
function getTriggers($container) {
    let $triggers = $container.querySelectorAll(
        '[data-role="form-submition-trigger"]'
    );

    return $triggers;
}


/**
 * @param {Element} $trigger
 */
function registerTriggerEventListener($trigger) {
    let triggerEvent = $trigger.getAttribute('data-form-submition-trigger-event');
    let targetFormId = $trigger.getAttribute('data-target-form');

    $trigger.addEventListener(triggerEvent, function (event) {
        /** @type {HTMLFormElement} */
        let $targetForm = document.getElementById(targetFormId);

        if ($targetForm) {
            $targetForm.submit();
        }
    })
}


document.addEventListener('DOMContentLoaded', function (event) {
    let $triggers = getTriggers(document.body);

    for (const $trigger of $triggers) {
        registerTriggerEventListener($trigger, document.body);
    }
});

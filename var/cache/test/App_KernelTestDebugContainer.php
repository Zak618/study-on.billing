<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDCsiSmr\App_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDCsiSmr/App_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerDCsiSmr.legacy');

    return;
}

if (!\class_exists(App_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerDCsiSmr\App_KernelTestDebugContainer::class, App_KernelTestDebugContainer::class, false);
}

return new \ContainerDCsiSmr\App_KernelTestDebugContainer([
    'container.build_hash' => 'DCsiSmr',
    'container.build_id' => 'ee5f64f4',
    'container.build_time' => 1710746211,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDCsiSmr');

<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {

    $languageFilePrefix = 'LLL:EXT:tokenized_downloads/Resources/Private/Language/locallang.xlf:';
    $frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';


    // Add additional fields for upload CTypes
    $additionalColumns = [
        'token_protected' => [
            'exclude' => true,
            'label' => $languageFilePrefix . 'tt_content.token_protected',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 'uploads', 'token_protected');

});

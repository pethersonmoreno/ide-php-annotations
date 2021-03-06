<?php

class PHPUnitStandard_Sniffs_Testing_NoInterfacesSniff
implements PHP_CodeSniffer_Sniff {

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register() {
        return array(
            T_INTERFACE,
        );
    }

    /**
     * Processes the tokens that this sniff is interested in.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
     * @param int                  $stackPtr  The position in the stack where
     *                                        the token was found.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {
        $interfaceName = $phpcsFile->getDeclarationName($stackPtr);
        $phpcsFile->addError(
            'No interfaces allowed in tests; found %s',
            $stackPtr,
            'Found',
            array($interfaceName)
        );
    }
}

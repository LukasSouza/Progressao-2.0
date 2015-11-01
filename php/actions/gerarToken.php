<?php
	// ARQUIVO: gerarToken.php
	// Função: Gera um token , aceitando como parametro um valor PAR
	// *Vale lembrar que é necessário implementar a funcionalidade de checar se aquele token já não foi gerado
	// *Todavia isso não é muito necessário para valores de entrada muito alto, ex: 128
	
		function generateRandomString( $size )
    {
        if ( $size % 2 != 0 ) throw new Exception("O parametro da funcao generateRandomString deve ser um numero par", 1);

        $size   = $size / 2;
        $bytes  = openssl_random_pseudo_bytes( $size );
        $random = bin2hex( $bytes );

        return $random;
    }
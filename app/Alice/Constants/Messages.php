<?php

namespace App\Alice\Constants;

/**
 * This class holds default messages.
 */

class Messages
{
    const TOKEN_INVALID = 'Token invalid.';
    const TOKEN_EXPIRED = 'Token kadaluarsa.';
    const TOKEN_BLACKLISTED = 'Token masuk ke dalam daftar blacklist.';
    const TOKEN_REQUIRED = 'Perlu token untuk akses.';

    const REGISTRATION_SUCCESS = 'Pendaftaran berhasil.';

    const VALIDATION_FAIL = 'Mohon periksa kembali data yang Anda masukkan.';
    const AUTHENTICATION_FAIL = 'Username atau password salah.';
}

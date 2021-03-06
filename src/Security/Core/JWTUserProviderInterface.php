<?php declare(strict_types=1);

namespace Auth0\JWTAuthBundle\Security\Core;

use stdClass;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * An UserProviderInterface adapter for our JWT users.
 */
interface JWTUserProviderInterface extends UserProviderInterface
{
    /**
     * Loads the user for the given decoded JWT.
     *
     * This method must throw JWTInfoNotFoundException if the user is not
     * found.
     *
     * @param stdClass $jwt The decoded Json Web Token.
     *
     * @return UserInterface
     *
     * @throws AuthenticationException If the user is not found.
     */
    public function loadUserByJWT(stdClass $jwt);

    /**
     * Returns an anonymous user.
     *
     * This can return a JWTInfoNotFoundException exception if you don't want
     * to handle anonymous users.
     *
     * It is recommended to return a user with the role IS_AUTHENTICATED_ANONYMOUSLY
     *
     * @return null
     */
    public function getAnonymousUser();
}

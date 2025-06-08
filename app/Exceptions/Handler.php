<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        /**modified part**/
        /*  if ($request->wantsJson()) {
            return response([
                'success' => false,
                'message' => $exception->getMessage()
            ], 404);
        }

        if ($exception instanceof AuthorizationException) {
            return redirect('login');

            //or simply
            //  return view('errors.forbidden');
            //but this will return an OK, 200 response.
        } */
        /**end of modified part**/

        // default this only
        return parent::render($request, $exception);
        //return parent::render($request, $exception);
    }
}

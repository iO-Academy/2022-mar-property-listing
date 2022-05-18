<?php

namespace PennyLaneProperties\Property;

class Property
{
    protected string $agentRef;
    protected string $image;
    protected string $address_1;
    protected string $address_2;
    protected string $town;
    protected string $postcode;
    protected string $status;
    protected string $type;
    protected string $imageUrl = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAY1BMVEXd3d2EhITj4+Pf39+CgoJ/f3+enp7k5OR7e3vb29uQkJDFxcWGhobV1dV6enrn5+fLy8uXl5dzc3PQ0NCnp6fAwMCzs7OhoaG5ubmZmZmSkpKrq6u1tbXDw8NpaWnz8/NsbGz4JcnUAAAL+UlEQVR4nO1diYKjKBBVCqIogmcStXt2/v8rtwpzgJrO9Gx3x2R5O9uJiAfPoi4IRlFAQEBAQEBAQEBAQEBAQEBAQMBTQkaA/wW4gEDJEpIBe3Fa5q37uLW413Tx0bw2J58CRKwYRCyygr0yK5+SE2B7wVWseLp/aVKYSa4wHzaVNUqomICfpQH5Yzf5s4BDteuv2K0LigQJwFodn6G4PgAS+JK8sIw7iLW8ISiQ5FzELgTvUFResQuxzG/orWpylyrUJE5VFYv+NXUtcaIuWOUEe0hyFMIhY/qrYp6+JXDPfj8f7ssJyKQZ0ngdIiuTV6PkPieoW8eUK6fX+H0oHRl7wH1/J+5xAqxUInZYQOdEKO+QuHwxrXKHExYdtC8kWjVHskDnMtQqeicZBYevgg85AdPx1GMkrtGDZbLX3DlICU4h0MuQ8hEniRwEn6g4MaIzaYPiJI9dO6Q4hUCPasKX4zYnkOyJETWpVUXikHZm2hUxQKf2qmPw2ykEegVhWeWEPHZTKkeXEiX1LrrIgsTgJ9NYyi96BUOgJHoJx3aNE2wWY+1FSCY5EAKjvugS3gDa6L2jVcjfEwdwajwv1uXEvKPfqpRjgHVrvK5BX0xRpV4HEqJ7BQ9uzokkT172brinyAAXZuVgYB2aZeXYoBRDoKfXKQs5AQpuYh/1m7nRJ1i0015VLjAEenJSFpwkTTYLbnQV3Xz2YHWxf4qseXKz7HGCGgFGfXHl6Q8a4HdHR6xkkRge4vYzJHF8bknxOeGxDW6cgrr1ghlUN0mTuCcgI1WoVDlWGc+RI49PS8ys71zkY9pKlU8AalW5qytJnePUYlLKpIIulBA5Uwj0rPA54Z6XZoMbpy623hyFwO60900u+rUYArm0oll+3lGgmZy4isEGN1cgI6zIJn2KPutMDM75WnX1a7PCl7GnwU1OhMbgxnnS6LWz8eq46kPksyIZO/i6CHVt8pQd6BYn9Q5m7UkoALq2WfDj3Gc1GAL5vKrSPGFYuOREkeFIS9dvJdsCu7knR/kBCa51AdhrTydxsXvCHNyCE8qG6NFJEYF19zvhdYx4SrC1c3ubyMr3a58xBFqRE501CTlm16awYj1xT44I8xNsUwjkgKfVE6WbbJxrrpzYvBFqklMecWopCYLZO3mDGVLrrLhZE+xl+nIy+uDp3jzPKBBgcOMl4dFWVMw3wKg51VyTeHKg0Ynx27sMgdD1gyeY9EWTsGAUTlaIdKvIfU8LVWib3hCRSwfKypm3z2CfuidGUWmB9PHPNvHTAGlsotk1Eza4cdOHYN7jj4RkajJPD67hJp3MXLNs03Tx+1oGZlPAG9/5elMJP7ghAyyrO0IyHcnRk58NHANzQyBC2pPm2bCoWOPqaRKu/fHw+cj5R5xQfmCYVMYVFAJ5Y0NI3IadFWmKwR/gjOthcr8uXgl5pX/ECPFJKkMsBo6T3OPUjgJtNQSCZO+N451GbmbKtfXr3Ac5K/6FGEMFbZV3fJqcocftiYpNdpRu4sjmBA6ei451TK7EfUUyExdSGbMkAupa4VErVJ5sLtuE4Wvqpo1ISMqZh4FuV8rVJ8XEWiDxNpMDYGiWvaxMumNsUyNjpFt5rFyvtB7JSPomw84l+KycTKKinAy1lT5rvFzw9LghrUIzAlK3BWgvvMFvcquSZnBzAp+GaG2a3yE56WZOjqi2omvRlLz5nTvmGNx4IoJeGvq2n+82XovFXGGz6FB7LHOBIZDcwDAqpdf9DoHBTeJ37aS0j/Q/iAkZGV/48AJy0usXqtUpBHokyPGgYRhXSVBwc/HSgLo+Ouikf31181e4TD6/NJvRrLjrtfH/tAV4rF9rSADcB2WDG29IPDId5/+RjDMnaMln0WSUFNmJ8BMo4HwcJ3a2la8kRDwf7L6VOPobkDxqjG/g6hYjzNFVZxQQVA+LlafA5dIjbHbxzUnzgP2l0hTef42c2NMI31mxZtmOuF8H1tAsP8avhVngwpUe5kn5RRroSyAoi+nrcBoFci19mjWP+B0DlK65USgknXFvAyTNTvsiTTKDPswCQ2DtfBrCPE33I2DdVVEoCm5mt2mT8t+CaeoSu874sjPVM3d2k3hQAjtp7fwJ0rKC+8NQgA5V/02MnFiZ5e1RKt80P8+nrItHKVmTTQqfY3DjelMSheRNfzoC/hwoQeDZOEiiirKeuK/OHxYjA9gMxuRfeqm0WeL+O6BsgsCzyhF75xRU6fFxcQ9Aoym4mQ9QmfYbu42LdCeT6OLZAvVYVOtieGgoyLq6900ALH/O9o3glIyF6DL1C2hMPn1w0o2ViTdcN/2c7acooVzS0Myms8Cj9Kt7D942/eLk5zg5DXw5t7O9cUHI65/i4wqhtpehdgC5/jEhuYJveobBYziJt5ax94CcPICSeONy8mXJksBJ4CRwEjgJnMzwN5zw9aGw9eL10ufihGf3MayMmSpxq/JaNvO5OBFFwljyIZhZzKUmTszqYcysJWaeihOVNnd9TGD9Sofg68cBrHWeZ+JExeI+JxHbLdt5M8kMa7mZZ+IEm/YHyYw1TmJx6+eTzy4ngZMocLKGB3BChjxwMqMESQmcBE7mV1jpO3zLabYH6djASeBkcYXAyfIKgZPlFQInyysETpZXCJwsrxA4WV4hcLK8QuBkeYXAyfIKgZPlFV6Bk/sHBU6W+P9xcn/O3f+Ok7K4j7Uxr9flBNuW3oVYaeZLc/K3CJwETgIngZPAyRyBkyUCJ0sETpYInCwROFkicLJE4GSJwMkSgZMlAidLBE6WgFzzr0F6Y/41pMu6j1rY488ARbX7EvT9jXayQ7+svbnfWXuAhCXsK3BjGQaQa5V/to2fxzc/sRsisWU5CQj4E3yJLvkstt1xoFyxCt+Lw27Xbvqd8uifCC5+EtY/2fYaDqX+UUZO2DIl0fKddrZw8RzljfK/ueKj10b9DPw1heD2vnk98A+4Qahzmi/h9jth72+6x7N/deuez+UrT1o6TZeeozY/1eYJiYBWVAdasO3ic9O3BCJrMtl5j4SzW45FZ2MK9PKyU73TF1qp+Lwwna0HNnaAaeN8lgc19s8AefZmoB1Q2VZKjdggyd6zYajeTJkdGWsHycpeqRZgwNIh65IxU0M+rTxXZDsGVZ9EyagaVg14eKk6/EdrGErT03qBTVZVw6FgncppPXvcGLJ+07ICndYlq2qZa31o05iWKut01mf62Og2Sfq6yHV9aIWCsVLpMHSVVuNQv1HIl7SiLpOxzhkTOuk0rT5d1iP+s6u4N5pebVbquN/Fmh3rI5Uq0SM2HRdDl3JhKh0NujSm1C3ed1fn/0iRFfTqsl5DpnO7x5hDXZhCZ8aYvrbKQyiVmSLtTadHk/GMQ1TqfVnvqfXJTgw1MVOZpPolu/pI638rZRh74PrTd4FK473udXuopRLYHQqeGaIpq1Q9NkJoLXQ0ZdDSjLFdXeLjxgYno84ZwJvujnWTVAIGXZR126Ao5CdO8GQig7RNmpTXtT4YKycRyonWdb+Rpf7XQJz87rDLpFEmsJFFmiUTJ/3elGmf51UNitPyg3qYOMnrMQFD3yQosatEb7CIZ/9UYtgJdeKEVPSYZodYRI3Oyryt3ztaehOkUmWelxtWJ0BrYu6NirV803tZDPa+u7ozaFBsd9lpeazHqBj03nICTKhGdkITnalCpZsWhgudF2lMG7ntO6NsGog5qlOxL3RVyFYc8npvS1VUFI9e4PEjYP/ufu1ZqX8XbKxTFGpmi2ihcSh/H4yprnsi1v/CB1zEtahRL0dM/SqYoVpjXZvd76NhkY6bX6hjdV3Xw+/WMMN1Y7fq6Eifv8pY0+eWSUGnIi+AFSWtD9odT6/0KCfvq2wgKvJIsqLrGnrpisRq6GeUx5w8DChLckzKEr81UNh9TU7fS0JTkrNSlNJuYGexpdBMHw9r7x9hcrSmdzKDfXuf661O70Y5lZw8XtqU08tXTluegz8VMVsHz35G5PzdOCWnxpxivNO7VCf3QV798tObDqe95/LLH5BXZx/oHXrSxpZwPb33Zr1raUBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAgMW/JKKvfYPQYBkAAAAASUVORK5CYII=";

    public function displayCard(): string
    {
        $returnString = "<div class='col-sm-12 col-md-4 col-lg-3 '>"
            . "<div class='card card__status card__status";
        if ($this->status == 'Sold') {
            $returnString .= '--sold';
        } elseif ($this->status == 'For Sale') {
            $returnString .= '--sale';
        } elseif ($this->status == 'Let Agreed') {
            $returnString .= '--letAgreed';
        } else {
            $returnString .= '--toLet';
        }
        $returnString .= " border border-dark position-relative'>"
            . "<span class='visually-hidden'>New alerts</span>"
            . "<img src='";
        if($this->image){
            $this->imageUrl = 'https://dev.io-academy.uk/resources/property-feed/images/' . $this->image;
        }
        $returnString .= "{$this->getImageUrl()}"
            . "' class='card-img-top' alt='Photo of {$this->getFullAddress()}'>"
            ."<div class='card-body'>"
            ."<p class='card-text'>{$this->getFullAddress()}</p>"
            ."<a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>"
            ."</div></div></div>";

        return $returnString;
    }

    /**
     * @return string
     */
    public function getFullAddress(): string
    {
        if (is_numeric($this->address_1)){
            $fullAddress = $this->address_1 . ' '. $this->address_2 . ', ' . $this->town . ', ' . $this->postcode;
        } else {
            $fullAddress = $this->address_1 . ', '. $this->address_2 . ', ' . $this->town . ', ' . $this->postcode;
        };

        return $fullAddress;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * This will be used in story 3
     * @return string
     */
    public function getAgentRef(): string
    {
        return $this->agentRef;
    }




}
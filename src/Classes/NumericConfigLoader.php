<?php

    class NumericConfigLoader {
        Public $ConfigFile;
        Public $ConfigDepth;
        Public $DistanceFromRoot;

        Public Function __construct($ConfigFile, $DistanceFromRoot = 0) {
            $Root = Null;
            if ($DistanceFromRoot != 0) {
                for ($i = 1; $i <= $DistanceFromRoot; $i++) {
                    $Root = $Root . '../';
                }
            }

            $this->Root = $Root;
            $this->ConfigFile = include($this->Root . 'Config/' . $ConfigFile . '.php');
        }

        Public Function _list()
        {
            $OutputList = Null;
            $i = count($this->ConfigFile);
            $i = $i - 1;
            while ($i > 0) {
                $OutputList = $OutputList . '<li>' . $this->ConfigFile[($i - 1)] . ' - ' . $this->ConfigFile[$i] . '</li>
                ';
                $i = $i - 2;
            }
            return $OutputList;
        }
    }

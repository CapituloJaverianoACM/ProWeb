<?php

  /**
   * An Enum class to enumerate the types of movements the user can do.
   */
  abstract class TypeTransferEnum {
    const ConsignSavingsAccount = 1;
    const ConsignCredit = 2;
    const PayCreditCard = 3;
    const CashConsign = 4;
  }
